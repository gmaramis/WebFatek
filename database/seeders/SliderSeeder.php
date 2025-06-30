<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data slider yang ada
        Slider::truncate();

        // Buat 3 slider contoh
        Slider::create([
            'judul' => 'FAKULTAS TEKNIK UNIMA',
            'deskripsi' => 'Mengembangkan talenta teknologi masa depan melalui pendidikan berkualitas dan inovasi berkelanjutan',
            'gambar' => 'sliders/slider-1.jpg', // Akan diupload manual oleh admin
            'link' => null,
            'urutan' => 1,
            'is_active' => true,
        ]);

        Slider::create([
            'judul' => 'Inovasi & Penelitian',
            'deskripsi' => 'Mengembangkan solusi teknologi untuk tantangan global melalui penelitian dan kolaborasi internasional',
            'gambar' => 'sliders/slider-2.jpg', // Akan diupload manual oleh admin
            'link' => '/p3ki',
            'urutan' => 2,
            'is_active' => true,
        ]);

        Slider::create([
            'judul' => 'Karir Cemerlang',
            'deskripsi' => 'Lulusan kami telah bekerja di perusahaan teknologi terkemuka di Indonesia dan internasional',
            'gambar' => 'sliders/slider-3.jpg', // Akan diupload manual oleh admin
            'link' => '/alumni',
            'urutan' => 3,
            'is_active' => true,
        ]);

        $this->command->info('Slider seeder berhasil dijalankan!');
        $this->command->info('Silakan upload gambar slider melalui admin panel.');
    }
}
