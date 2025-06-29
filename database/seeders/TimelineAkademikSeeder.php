<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TimelineAkademik;

class TimelineAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TimelineAkademik::create([
            'judul' => 'Awal Semester Ganjil',
            'deskripsi' => 'Dimulainya perkuliahan semester ganjil tahun akademik 2024/2025',
            'bulan' => 'Agustus',
            'tahun' => 2024,
            'warna' => 'blue',
            'icon' => 'fas fa-graduation-cap',
            'status' => 'aktif',
            'urutan' => 1,
            'catatan' => 'Perkuliahan dimulai minggu pertama Agustus',
        ]);

        TimelineAkademik::create([
            'judul' => 'UTS Semester Ganjil',
            'deskripsi' => 'Pelaksanaan Ujian Tengah Semester untuk semester ganjil',
            'bulan' => 'Oktober',
            'tahun' => 2024,
            'warna' => 'yellow',
            'icon' => 'fas fa-clipboard-check',
            'status' => 'aktif',
            'urutan' => 2,
            'catatan' => 'UTS berlangsung selama 1-2 minggu',
        ]);

        TimelineAkademik::create([
            'judul' => 'UAS Semester Ganjil',
            'deskripsi' => 'Pelaksanaan Ujian Akhir Semester untuk semester ganjil',
            'bulan' => 'Desember',
            'tahun' => 2024,
            'warna' => 'red',
            'icon' => 'fas fa-exclamation-triangle',
            'status' => 'aktif',
            'urutan' => 3,
            'catatan' => 'UAS berlangsung sebelum libur Natal',
        ]);

        TimelineAkademik::create([
            'judul' => 'Awal Semester Genap',
            'deskripsi' => 'Dimulainya perkuliahan semester genap tahun akademik 2024/2025',
            'bulan' => 'Februari',
            'tahun' => 2025,
            'warna' => 'orange',
            'icon' => 'fas fa-calendar-week',
            'status' => 'aktif',
            'urutan' => 4,
            'catatan' => 'Perkuliahan dimulai minggu pertama Februari',
        ]);

        TimelineAkademik::create([
            'judul' => 'UTS Semester Genap',
            'deskripsi' => 'Pelaksanaan Ujian Tengah Semester untuk semester genap',
            'bulan' => 'April',
            'tahun' => 2025,
            'warna' => 'yellow',
            'icon' => 'fas fa-clipboard-check',
            'status' => 'aktif',
            'urutan' => 5,
            'catatan' => 'UTS berlangsung setelah libur Paskah',
        ]);

        TimelineAkademik::create([
            'judul' => 'UAS Semester Genap',
            'deskripsi' => 'Pelaksanaan Ujian Akhir Semester untuk semester genap',
            'bulan' => 'Juni',
            'tahun' => 2025,
            'warna' => 'red',
            'icon' => 'fas fa-exclamation-triangle',
            'status' => 'aktif',
            'urutan' => 6,
            'catatan' => 'UAS berlangsung sebelum libur semester',
        ]);
    }
}
