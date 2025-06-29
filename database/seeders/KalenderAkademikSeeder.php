<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KalenderAkademik;

class KalenderAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KalenderAkademik::create([
            'judul' => 'Kalender Akademik Fakultas Teknik UNIMA 2024/2025',
            'deskripsi' => 'Kalender akademik yang berlaku untuk semester ganjil dan genap tahun akademik 2024/2025',
            'tahun_akademik' => '2024/2025',
            'pdf_url' => 'https://drive.google.com/file/d/example1/view?usp=sharing',
            'jpg_url' => 'https://drive.google.com/file/d/example2/view?usp=sharing',
            'pdf_name' => 'Kalender_Akademik_Fatek_2024_2025.pdf',
            'jpg_name' => 'Kalender_Akademik_Fatek_2024_2025.jpg',
            'pdf_size' => '1.2 MB',
            'jpg_size' => '800 KB',
            'tanggal_update' => now(),
            'status' => 'aktif',
            'urutan' => 1,
            'catatan' => 'Kalender akademik terbaru yang berlaku untuk tahun akademik 2024/2025',
        ]);

        KalenderAkademik::create([
            'judul' => 'Kalender Akademik Fakultas Teknik UNIMA 2023/2024',
            'deskripsi' => 'Kalender akademik yang berlaku untuk semester ganjil dan genap tahun akademik 2023/2024',
            'tahun_akademik' => '2023/2024',
            'pdf_url' => 'https://drive.google.com/file/d/example3/view?usp=sharing',
            'jpg_url' => null,
            'pdf_name' => 'Kalender_Akademik_Fatek_2023_2024.pdf',
            'jpg_name' => null,
            'pdf_size' => '1.0 MB',
            'jpg_size' => null,
            'tanggal_update' => now(),
            'status' => 'nonaktif',
            'urutan' => 2,
            'catatan' => 'Kalender akademik tahun sebelumnya',
        ]);

        KalenderAkademik::create([
            'judul' => 'Kalender Akademik Semester Ganjil 2024/2025',
            'deskripsi' => 'Kalender akademik khusus untuk semester ganjil tahun akademik 2024/2025',
            'tahun_akademik' => '2024/2025',
            'pdf_url' => 'https://drive.google.com/file/d/example4/view?usp=sharing',
            'jpg_url' => 'https://drive.google.com/file/d/example5/view?usp=sharing',
            'pdf_name' => 'Kalender_Semester_Ganjil_2024_2025.pdf',
            'jpg_name' => 'Kalender_Semester_Ganjil_2024_2025.jpg',
            'pdf_size' => '800 KB',
            'jpg_size' => '500 KB',
            'tanggal_update' => now(),
            'status' => 'aktif',
            'urutan' => 3,
            'catatan' => 'Kalender khusus semester ganjil',
        ]);
    }
}
