<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DokumenDownload;

class DokumenDownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokumen = [
            [
                'judul' => 'Pedoman Akademik 2024',
                'deskripsi' => 'Pedoman lengkap kegiatan akademik mahasiswa Fakultas Teknik UNIMA tahun 2024.',
                'kategori' => 'akademik',
                'file_path' => 'dokumen-download/pedoman-akademik-2024.pdf',
                'file_name' => 'Pedoman_Akademik_2024.pdf',
                'file_size' => '2500000',
                'file_type' => 'pdf',
                'download_count' => 45,
                'is_active' => true,
            ],
            [
                'judul' => 'Format Skripsi',
                'deskripsi' => 'Template dan format penulisan skripsi Fakultas Teknik UNIMA.',
                'kategori' => 'akademik',
                'file_path' => 'dokumen-download/format-skripsi.docx',
                'file_name' => 'Format_Skripsi_FT.docx',
                'file_size' => '1800000',
                'file_type' => 'docx',
                'download_count' => 78,
                'is_active' => true,
            ],
            [
                'judul' => 'Jadwal Kuliah 2024',
                'deskripsi' => 'Jadwal perkuliahan semester genap 2023/2024 Fakultas Teknik UNIMA.',
                'kategori' => 'akademik',
                'file_path' => 'dokumen-download/jadwal-kuliah-2024.xlsx',
                'file_name' => 'Jadwal_Kuliah_2024.xlsx',
                'file_size' => '850000',
                'file_type' => 'xlsx',
                'download_count' => 120,
                'is_active' => true,
            ],
            [
                'judul' => 'Panduan Magang & KKN',
                'deskripsi' => 'Panduan lengkap pelaksanaan magang dan KKN mahasiswa Fakultas Teknik.',
                'kategori' => 'akademik',
                'file_path' => 'dokumen-download/panduan-magang-kkn.pdf',
                'file_name' => 'Panduan_Magang_KKN.pdf',
                'file_size' => '3200000',
                'file_type' => 'pdf',
                'download_count' => 89,
                'is_active' => true,
            ],
            [
                'judul' => 'Form Pendaftaran Beasiswa',
                'deskripsi' => 'Formulir pendaftaran beasiswa internal Fakultas Teknik UNIMA.',
                'kategori' => 'administrasi',
                'file_path' => 'dokumen-download/form-beasiswa.docx',
                'file_name' => 'Form_Beasiswa_FT.docx',
                'file_size' => '1200000',
                'file_type' => 'docx',
                'download_count' => 56,
                'is_active' => true,
            ],
            [
                'judul' => 'Panduan ORMAWA',
                'deskripsi' => 'Panduan organisasi kemahasiswaan dan kegiatan ekstrakurikuler.',
                'kategori' => 'administrasi',
                'file_path' => 'dokumen-download/panduan-ormawa.pdf',
                'file_name' => 'Panduan_ORMAWA.pdf',
                'file_size' => '2100000',
                'file_type' => 'pdf',
                'download_count' => 34,
                'is_active' => true,
            ],
            [
                'judul' => 'SK Dekan 2024',
                'deskripsi' => 'Surat Keputusan Dekan Fakultas Teknik UNIMA tahun 2024.',
                'kategori' => 'administrasi',
                'file_path' => 'dokumen-download/sk-dekan-2024.pdf',
                'file_name' => 'SK_Dekan_2024.pdf',
                'file_size' => '1500000',
                'file_type' => 'pdf',
                'download_count' => 23,
                'is_active' => true,
            ],
            [
                'judul' => 'Form Cuti Dosen',
                'deskripsi' => 'Formulir pengajuan cuti untuk tenaga pendidik Fakultas Teknik.',
                'kategori' => 'administrasi',
                'file_path' => 'dokumen-download/form-cuti-dosen.docx',
                'file_name' => 'Form_Cuti_Dosen.docx',
                'file_size' => '950000',
                'file_type' => 'docx',
                'download_count' => 12,
                'is_active' => true,
            ],
            [
                'judul' => 'Profil Fakultas Teknik',
                'deskripsi' => 'Profil lengkap Fakultas Teknik UNIMA untuk publikasi dan kerjasama.',
                'kategori' => 'kerjasama',
                'file_path' => 'dokumen-download/profil-fakultas-teknik.pdf',
                'file_name' => 'Profil_Fakultas_Teknik.pdf',
                'file_size' => '4200000',
                'file_type' => 'pdf',
                'download_count' => 67,
                'is_active' => true,
            ],
            [
                'judul' => 'Logo Fakultas Teknik',
                'deskripsi' => 'Logo resmi Fakultas Teknik UNIMA dalam berbagai format.',
                'kategori' => 'kerjasama',
                'file_path' => 'dokumen-download/logo-fakultas-teknik.zip',
                'file_name' => 'Logo_Fakultas_Teknik.zip',
                'file_size' => '2800000',
                'file_type' => 'zip',
                'download_count' => 89,
                'is_active' => true,
            ],
            [
                'judul' => 'Kalender Akademik 2024',
                'deskripsi' => 'Kalender akademik tahun 2024 Fakultas Teknik UNIMA.',
                'kategori' => 'akademik',
                'file_path' => 'dokumen-download/kalender-akademik-2024.pdf',
                'file_name' => 'Kalender_Akademik_2024.pdf',
                'file_size' => '1700000',
                'file_type' => 'pdf',
                'download_count' => 156,
                'is_active' => true,
            ],
            [
                'judul' => 'Panduan Penelitian',
                'deskripsi' => 'Panduan pelaksanaan penelitian untuk dosen dan mahasiswa.',
                'kategori' => 'penelitian',
                'file_path' => 'dokumen-download/panduan-penelitian.pdf',
                'file_name' => 'Panduan_Penelitian.pdf',
                'file_size' => '3100000',
                'file_type' => 'pdf',
                'download_count' => 43,
                'is_active' => true,
            ],
            [
                'judul' => 'Panduan Pengabdian Masyarakat',
                'deskripsi' => 'Panduan pelaksanaan pengabdian masyarakat untuk dosen.',
                'kategori' => 'pengabdian',
                'file_path' => 'dokumen-download/panduan-pengabdian.pdf',
                'file_name' => 'Panduan_Pengabdian.pdf',
                'file_size' => '2800000',
                'file_type' => 'pdf',
                'download_count' => 28,
                'is_active' => true,
            ],
        ];

        foreach ($dokumen as $item) {
            DokumenDownload::create($item);
        }
    }
}
