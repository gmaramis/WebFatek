<?php

require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Dosen;

try {
    echo "=== IMPORT DATA DOSEN DARI EXCEL ===\n";
    
    // Baca file Excel
    $inputFileName = 'sumber/SISTER  Daftar_dosen fatek.xlsx';
    $spreadsheet = IOFactory::load($inputFileName);
    $worksheet = $spreadsheet->getActiveSheet();
    
    // Dapatkan range data
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
    
    echo "Total baris data: " . ($highestRow - 1) . "\n\n";
    
    // Mapping jurusan Excel ke slug database
    $jurusanMapping = [
        'S1 - Teknik Informatika' => 'teknik-informatika',
        'S1 - Teknik Sipil' => 'teknik-sipil',
        'S1 - Teknik Mesin' => 'teknik-mesin',
        'S1 - Pendidikan Teknik Elektro' => 'teknik-elektro',
        'S1 - Pendidikan Teknik Bangunan' => 'teknik-bangunan',
        'S1 - Arsitektur' => 'arsitektur',
        'S1 - Pendidikan Kesejahteraan Keluarga' => 'teknik-bangunan', // PKK masuk ke teknik bangunan
        'D3 - Teknik Listrik' => 'teknik-elektro',
    ];
    
    // Fungsi untuk parsing pendidikan terakhir
    function parsePendidikan($pendidikan) {
        if (preg_match('/^(S1|S2|S3|D3)/', $pendidikan, $matches)) {
            return $matches[1];
        }
        return 'S1'; // default
    }
    
    // Fungsi untuk konversi NIP dari scientific notation
    function formatNIP($nip) {
        if (is_numeric($nip) && $nip > 1e15) {
            return number_format($nip, 0, '', '');
        }
        return (string) $nip;
    }
    
    // Fungsi untuk mapping jurusan
    function mapJurusan($jurusanExcel) {
        global $jurusanMapping;
        
        // Cek mapping yang sudah didefinisikan
        if (isset($jurusanMapping[$jurusanExcel])) {
            return $jurusanMapping[$jurusanExcel];
        }
        
        // Jika tidak ada di mapping, coba parse dari nama jurusan
        if (preg_match('/S1 - (.+)/', $jurusanExcel, $matches)) {
            $jurusanName = strtolower($matches[1]);
            $jurusanName = str_replace(['pendidikan ', 'teknik '], '', $jurusanName);
            $jurusanName = str_replace(' ', '-', $jurusanName);
            return $jurusanName;
        }
        
        // Default untuk jurusan yang tidak dikenal
        return 'teknik-informatika';
    }
    
    // Hapus data dosen yang ada (opsional)
    echo "Menghapus data dosen yang ada...\n";
    Dosen::truncate();
    
    $imported = 0;
    $skipped = 0;
    
    // Baca data dari baris 2 (setelah header)
    for ($row = 2; $row <= $highestRow; $row++) {
        try {
            // Baca data dari Excel
            $nama = $worksheet->getCell(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(2) . $row)->getValue();
            $nip = $worksheet->getCell(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(3) . $row)->getValue();
            $pendidikan = $worksheet->getCell(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(4) . $row)->getValue();
            $statusAktivitas = $worksheet->getCell(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(6) . $row)->getValue();
            $jurusanExcel = $worksheet->getCell(\PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(7) . $row)->getValue();
            
            // Skip jika data kosong
            if (empty($nama) || empty($nip)) {
                $skipped++;
                continue;
            }
            
            // Parse dan mapping data
            $nipFormatted = formatNIP($nip);
            $pendidikanParsed = parsePendidikan($pendidikan);
            $jurusanMapped = mapJurusan($jurusanExcel);
            
            // Skip jika bukan jurusan teknik
            if (!in_array($jurusanMapped, ['teknik-informatika', 'teknik-sipil', 'teknik-elektro', 'teknik-mesin', 'arsitektur', 'teknik-bangunan'])) {
                $skipped++;
                continue;
            }
            
            // Cek apakah NIP sudah ada
            if (Dosen::where('nip', $nipFormatted)->exists()) {
                echo "Skip: NIP $nipFormatted sudah ada\n";
                $skipped++;
                continue;
            }
            
            // Buat record dosen baru
            Dosen::create([
                'nip' => $nipFormatted,
                'nama' => $nama,
                'gelar' => null, // Tidak ada di Excel
                'pendidikan_terakhir' => $pendidikanParsed,
                'status' => $statusAktivitas,
                'jurusan' => $jurusanMapped,
                'bidang_keahlian' => null, // Tidak ada di Excel
                'email' => null, // Tidak ada di Excel
                'foto' => null, // Tidak ada di Excel
                'is_active' => true,
            ]);
            
            $imported++;
            echo "Import: $nama ($nipFormatted) - $jurusanMapped\n";
            
        } catch (Exception $e) {
            echo "Error pada baris $row: " . $e->getMessage() . "\n";
            $skipped++;
        }
    }
    
    echo "\n=== HASIL IMPORT ===\n";
    echo "Berhasil diimport: $imported dosen\n";
    echo "Dilewati: $skipped dosen\n";
    echo "Total data di database: " . Dosen::count() . " dosen\n";
    
    // Tampilkan distribusi per jurusan
    echo "\n=== DISTRIBUSI PER JURUSAN ===\n";
    $jurusanStats = Dosen::selectRaw('jurusan, count(*) as total')
        ->groupBy('jurusan')
        ->orderBy('jurusan')
        ->get();
    
    foreach ($jurusanStats as $stat) {
        echo "$stat->jurusan: $stat->total dosen\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 