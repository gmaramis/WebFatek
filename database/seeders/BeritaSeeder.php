<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $judul = "Berita Ke-$i: Prestasi Mahasiswa Fakultas Teknik UNIMA";
            $slug = Str::slug($judul.'-'.Str::random(5));

            Berita::updateOrCreate(
                ['judul' => $judul], // Cari berdasarkan judul
                [
                    'slug' => $slug,
                    'isi' => "Ini adalah isi berita ke-$i tentang prestasi mahasiswa Fakultas Teknik UNIMA.",
                    'tanggal' => Carbon::now()->subDays(10 - $i),
                    'status' => 'published',
                    'gambar' => 'dummy.jpg', // Ganti dengan gambar default jika perlu
                ]
            );
        }
    }
}