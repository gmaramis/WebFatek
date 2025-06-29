<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PedomanAkademik;

class PedomanAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PedomanAkademik::create([
            'judul' => 'Pedoman Akademik Fakultas Teknik UNIMA 2025',
            'deskripsi' => 'Dokumen resmi yang berisi panduan lengkap tata tertib, aturan akademik, dan prosedur yang berlaku di Fakultas Teknik Universitas Negeri Manado',
            'file_url' => 'https://drive.google.com/file/d/13uZHLSnRTXZMVPuhxuNcxduFLC0RGHx8/view?usp=sharing',
            'file_name' => 'Pedoman_Akademik_Fatek_2025.pdf',
            'file_size' => '2.5 MB',
            'jumlah_halaman' => 150,
            'format_file' => 'PDF',
            'tanggal_update' => now(),
            'status' => 'aktif',
            'urutan' => 1,
            'catatan' => 'Pedoman akademik terbaru yang berlaku untuk tahun akademik 2024/2025',
        ]);

        PedomanAkademik::create([
            'judul' => 'Panduan Skripsi dan Tugas Akhir',
            'deskripsi' => 'Panduan lengkap untuk penyusunan skripsi dan tugas akhir mahasiswa Fakultas Teknik',
            'file_url' => 'https://drive.google.com/file/d/example2/view?usp=sharing',
            'file_name' => 'Panduan_Skripsi_Fatek_2025.pdf',
            'file_size' => '1.8 MB',
            'jumlah_halaman' => 85,
            'format_file' => 'PDF',
            'tanggal_update' => now(),
            'status' => 'aktif',
            'urutan' => 2,
            'catatan' => 'Panduan khusus untuk mahasiswa tingkat akhir',
        ]);

        PedomanAkademik::create([
            'judul' => 'Tata Tertib Laboratorium',
            'deskripsi' => 'Aturan dan tata tertib penggunaan laboratorium di Fakultas Teknik UNIMA',
            'file_url' => 'https://drive.google.com/file/d/example3/view?usp=sharing',
            'file_name' => 'Tata_Tertib_Lab_Fatek_2025.pdf',
            'file_size' => '1.2 MB',
            'jumlah_halaman' => 45,
            'format_file' => 'PDF',
            'tanggal_update' => now(),
            'status' => 'aktif',
            'urutan' => 3,
            'catatan' => 'Wajib dibaca sebelum menggunakan laboratorium',
        ]);
    }
}
