<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Dosen;

class ImportDosenExcel extends Command
{
    protected $signature = 'import:dosen-excel';
    protected $description = 'Import data dosen dari file Excel ke database';

    public function handle()
    {
        $this->info('=== IMPORT DATA DOSEN DARI EXCEL ===');
        $inputFileName = base_path('sumber/SISTER  Daftar_dosen fatek.xlsx');
        if (!file_exists($inputFileName)) {
            $this->error('File Excel tidak ditemukan: ' . $inputFileName);
            return 1;
        }
        $spreadsheet = IOFactory::load($inputFileName);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $this->info('Total baris data: ' . ($highestRow - 1));

        $jurusanMapping = [
            'S1 - Teknik Informatika' => 'teknik-informatika',
            'S1 - Teknik Sipil' => 'teknik-sipil',
            'S1 - Teknik Mesin' => 'teknik-mesin',
            'S1 - Pendidikan Teknik Elektro' => 'teknik-elektro',
            'S1 - Pendidikan Teknik Bangunan' => 'teknik-bangunan',
            'S1 - Arsitektur' => 'arsitektur',
            'S1 - Pendidikan Kesejahteraan Keluarga' => 'teknik-bangunan',
            'D3 - Teknik Listrik' => 'teknik-elektro',
        ];

        function parsePendidikan($pendidikan) {
            if (preg_match('/^(S1|S2|S3|D3)/', $pendidikan, $matches)) {
                return $matches[1];
            }
            return 'S1';
        }
        function formatNIP($nip) {
            if (is_numeric($nip) && $nip > 1e15) {
                return number_format($nip, 0, '', '');
            }
            return (string) $nip;
        }
        $mapJurusan = function($jurusanExcel) use ($jurusanMapping) {
            if (isset($jurusanMapping[$jurusanExcel])) {
                return $jurusanMapping[$jurusanExcel];
            }
            if (preg_match('/S1 - (.+)/', $jurusanExcel, $matches)) {
                $jurusanName = strtolower($matches[1]);
                $jurusanName = str_replace(['pendidikan ', 'teknik '], '', $jurusanName);
                $jurusanName = str_replace(' ', '-', $jurusanName);
                return $jurusanName;
            }
            return 'teknik-informatika';
        };
        $mapStatus = function($statusExcel) {
            $statusExcel = strtoupper(trim($statusExcel));
            return match ($statusExcel) {
                'AKTIF' => 'Aktif',
                'TUGAS BELAJAR' => 'Tugas Belajar',
                'IJIN BELAJAR' => 'Tugas Belajar',
                'TIDAK AKTIF' => 'Tidak Aktif',
                default => 'Aktif',
            };
        };

        $this->info('Menghapus data dosen yang ada...');
        Dosen::truncate();
        $imported = 0;
        $skipped = 0;
        for ($row = 2; $row <= $highestRow; $row++) {
            $nama = $worksheet->getCell('B' . $row)->getValue();
            $nip = $worksheet->getCell('C' . $row)->getValue();
            $pendidikan = $worksheet->getCell('D' . $row)->getValue();
            $statusAktivitas = $worksheet->getCell('F' . $row)->getValue();
            $jurusanExcel = $worksheet->getCell('G' . $row)->getValue();
            if (empty($nama) || empty($nip)) {
                $skipped++;
                continue;
            }
            $nipFormatted = formatNIP($nip);
            $pendidikanParsed = parsePendidikan($pendidikan);
            $jurusanMapped = $mapJurusan($jurusanExcel);
            if (!in_array($jurusanMapped, ['teknik-informatika', 'teknik-sipil', 'teknik-elektro', 'teknik-mesin', 'arsitektur', 'teknik-bangunan'])) {
                $skipped++;
                continue;
            }
            if (Dosen::where('nip', $nipFormatted)->exists()) {
                $this->warn("Skip: NIP $nipFormatted sudah ada");
                $skipped++;
                continue;
            }
            $statusMapped = $mapStatus($statusAktivitas);
            Dosen::create([
                'nip' => $nipFormatted,
                'nama' => $nama,
                'gelar' => null,
                'pendidikan_terakhir' => $pendidikanParsed,
                'status' => $statusMapped,
                'jurusan' => $jurusanMapped,
                'bidang_keahlian' => null,
                'email' => null,
                'foto' => null,
                'is_active' => true,
            ]);
            $imported++;
            $this->info("Import: $nama ($nipFormatted) - $jurusanMapped");
        }
        $this->info("\n=== HASIL IMPORT ===");
        $this->info("Berhasil diimport: $imported dosen");
        $this->info("Dilewati: $skipped dosen");
        $this->info("Total data di database: " . Dosen::count() . " dosen");
        $this->info("\n=== DISTRIBUSI PER JURUSAN ===");
        $jurusanStats = Dosen::selectRaw('jurusan, count(*) as total')->groupBy('jurusan')->orderBy('jurusan')->get();
        foreach ($jurusanStats as $stat) {
            $this->info("$stat->jurusan: $stat->total dosen");
        }
        return 0;
    }
} 