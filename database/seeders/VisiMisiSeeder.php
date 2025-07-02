<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VisiMisi;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::firstOrCreate(
            ['judul' => 'Visi Misi Fakultas Teknik UNIMA'], // Cari berdasarkan judul
            [
                'visi' => '<p>Menjadi Fakultas Teknik yang unggul dalam pengembangan ilmu pengetahuan, teknologi, dan seni yang berwawasan lingkungan untuk menghasilkan lulusan yang berkualitas, berdaya saing global, dan berakhlak mulia.</p>',
                'misi' => '<ol>
                    <li>Menyelenggarakan pendidikan tinggi yang berkualitas dalam bidang teknik</li>
                    <li>Melaksanakan penelitian yang inovatif dan bermanfaat bagi masyarakat</li>
                    <li>Melakukan pengabdian kepada masyarakat yang berkelanjutan</li>
                    <li>Mengembangkan kerjasama dengan berbagai pihak untuk meningkatkan kualitas pendidikan</li>
                    <li>Mengembangkan sistem manajemen yang efektif dan efisien</li>
                </ol>',
                'tujuan' => '<ol>
                    <li>Menghasilkan lulusan yang berkualitas dan berdaya saing global</li>
                    <li>Menghasilkan penelitian yang inovatif dan bermanfaat</li>
                    <li>Meningkatkan kontribusi dalam pengabdian kepada masyarakat</li>
                    <li>Mengembangkan kerjasama yang berkelanjutan</li>
                    <li>Mewujudkan sistem manajemen yang efektif dan efisien</li>
                </ol>',
                'sasaran' => '<ol>
                    <li>Akreditasi program studi minimal B</li>
                    <li>Publikasi penelitian di jurnal terakreditasi</li>
                    <li>Kerjasama dengan industri dan lembaga pendidikan</li>
                    <li>Peningkatan kualitas layanan akademik</li>
                    <li>Pengembangan infrastruktur yang mendukung</li>
                </ol>',
                'is_active' => true,
            ]
        );
    }
}
