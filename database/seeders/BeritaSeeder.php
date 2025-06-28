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
        $beritas = [
            [
                'judul' => 'Fakultas Teknik UNIMA Raih Akreditasi A untuk Program Studi Teknik Informatika',
                'slug' => 'fakultas-teknik-unima-raih-akreditasi-a-untuk-program-studi-teknik-informatika',
                'isi' => '<p>Fakultas Teknik UNIMA berhasil meraih akreditasi A untuk Program Studi Teknik Informatika dari Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT).</p><p>Akreditasi A ini merupakan pengakuan tertinggi yang diberikan kepada program studi yang telah memenuhi standar mutu pendidikan nasional.</p><p>Dengan akreditasi A ini, Program Studi Teknik Informatika UNIMA semakin dipercaya untuk menghasilkan lulusan yang berkualitas dan siap bersaing di dunia kerja.</p>',
                'tanggal' => Carbon::now()->subDays(2)->toDateString(),
                'gambar' => null,
            ],
            [
                'judul' => 'Mahasiswa Teknik Sipil UNIMA Juara Kompetisi Bridge Design Competition 2024',
                'slug' => 'mahasiswa-teknik-sipil-unima-juara-kompetisi-bridge-design-competition-2024',
                'isi' => '<p>Tim mahasiswa Program Studi Teknik Sipil UNIMA berhasil meraih juara pertama dalam kompetisi Bridge Design Competition 2024 yang diselenggarakan di Jakarta.</p><p>Tim yang terdiri dari 3 mahasiswa semester 6 ini berhasil mengalahkan 50 tim dari berbagai universitas di Indonesia.</p><p>Desain jembatan yang mereka buat menggunakan konsep ramah lingkungan dan sustainable development.</p>',
                'tanggal' => Carbon::now()->subDays(5)->toDateString(),
                'gambar' => null,
            ],
            [
                'judul' => 'Workshop IoT untuk Mahasiswa Teknik Elektro UNIMA',
                'slug' => 'workshop-iot-untuk-mahasiswa-teknik-elektro-unima',
                'isi' => '<p>Program Studi Teknik Elektro UNIMA menyelenggarakan workshop Internet of Things (IoT) untuk mahasiswa semester 4-6.</p><p>Workshop yang berlangsung selama 3 hari ini menghadirkan praktisi IoT dari perusahaan teknologi terkemuka.</p><p>Mahasiswa diajarkan cara membuat sistem IoT sederhana menggunakan Arduino dan sensor-sensor elektronik.</p>',
                'tanggal' => Carbon::now()->subDays(8)->toDateString(),
                'gambar' => null,
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
} 