<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusans = [
            [
                'nama' => 'Teknik Informatika',
                'kode' => 'TI',
                'deskripsi' => 'Program studi yang mempelajari pengembangan perangkat lunak, sistem informasi, dan teknologi komputasi untuk solusi digital masa depan.',
                'visi' => 'Menjadi program studi unggulan dalam pengembangan teknologi informasi dan komunikasi yang berorientasi pada inovasi dan kewirausahaan.',
                'misi' => '1. Menyelenggarakan pendidikan tinggi berkualitas dalam bidang teknologi informasi dan komunikasi\n2. Melakukan penelitian yang inovatif dan berkontribusi pada pengembangan ilmu pengetahuan\n3. Melaksanakan pengabdian kepada masyarakat melalui penerapan teknologi informasi\n4. Menjalin kerjasama dengan berbagai pihak untuk meningkatkan kualitas pendidikan',
                'tujuan' => 'Menghasilkan lulusan yang kompeten dalam pengembangan perangkat lunak, sistem informasi, dan teknologi komputasi yang siap berkontribusi dalam pembangunan nasional.',
                'gambar' => 'TI.jpg',
                'kepala_jurusan' => 'Dr. Ir. John Doe, M.Kom.',
                'nip_kepala' => '198501012010011001',
                'akreditasi' => 'B',
                'jenjang' => 'S1',
                'durasi_studi' => 8,
                'prospek_karir' => 'Software Developer, System Analyst, Database Administrator, Network Administrator, IT Consultant, Web Developer, Mobile App Developer, Data Scientist',
                'is_active' => true,
            ],
            [
                'nama' => 'Teknik Sipil',
                'kode' => 'TS',
                'deskripsi' => 'Program studi yang mempelajari perencanaan, perancangan, dan konstruksi infrastruktur untuk pembangunan berkelanjutan.',
                'visi' => 'Menjadi program studi terdepan dalam pengembangan infrastruktur berkelanjutan yang berkontribusi pada pembangunan nasional.',
                'misi' => '1. Menyelenggarakan pendidikan tinggi berkualitas dalam bidang teknik sipil\n2. Melakukan penelitian inovatif dalam pengembangan infrastruktur berkelanjutan\n3. Melaksanakan pengabdian masyarakat melalui penerapan teknologi konstruksi\n4. Menjalin kerjasama dengan industri dan lembaga terkait',
                'tujuan' => 'Menghasilkan lulusan yang kompeten dalam perencanaan, perancangan, dan konstruksi infrastruktur yang berkelanjutan.',
                'gambar' => 'sipil.jpg',
                'kepala_jurusan' => 'Ir. Jane Smith, M.T.',
                'nip_kepala' => '198502022010012002',
                'akreditasi' => 'B',
                'jenjang' => 'S1',
                'durasi_studi' => 8,
                'prospek_karir' => 'Civil Engineer, Structural Engineer, Transportation Engineer, Water Resources Engineer, Construction Manager, Project Manager, Consultant',
                'is_active' => true,
            ],
            [
                'nama' => 'Teknik Elektro',
                'kode' => 'TE',
                'deskripsi' => 'Program studi yang mempelajari sistem kelistrikan, elektronika, dan teknologi energi untuk masa depan yang berkelanjutan.',
                'visi' => 'Menjadi program studi unggulan dalam pengembangan teknologi elektro yang inovatif dan berkelanjutan.',
                'misi' => '1. Menyelenggarakan pendidikan tinggi berkualitas dalam bidang teknik elektro\n2. Melakukan penelitian inovatif dalam pengembangan teknologi energi terbarukan\n3. Melaksanakan pengabdian masyarakat melalui penerapan teknologi elektro\n4. Menjalin kerjasama dengan industri energi dan telekomunikasi',
                'tujuan' => 'Menghasilkan lulusan yang kompeten dalam pengembangan sistem kelistrikan, elektronika, dan teknologi energi berkelanjutan.',
                'gambar' => 'elektro.jpg',
                'kepala_jurusan' => 'Ir. Ahmad Rahman, M.Eng.',
                'nip_kepala' => '198503032010011003',
                'akreditasi' => 'B',
                'jenjang' => 'S1',
                'durasi_studi' => 8,
                'prospek_karir' => 'Electrical Engineer, Power System Engineer, Electronics Engineer, Telecommunications Engineer, Control System Engineer, Renewable Energy Engineer',
                'is_active' => true,
            ],
            [
                'nama' => 'Teknik Mesin',
                'kode' => 'TM',
                'deskripsi' => 'Program studi yang mempelajari perancangan, pembuatan, dan pemeliharaan mesin untuk industri dan teknologi modern.',
                'visi' => 'Menjadi program studi terdepan dalam pengembangan teknologi mesin yang inovatif dan berkelanjutan.',
                'misi' => '1. Menyelenggarakan pendidikan tinggi berkualitas dalam bidang teknik mesin\n2. Melakukan penelitian inovatif dalam pengembangan teknologi manufaktur\n3. Melaksanakan pengabdian masyarakat melalui penerapan teknologi mesin\n4. Menjalin kerjasama dengan industri manufaktur dan otomotif',
                'tujuan' => 'Menghasilkan lulusan yang kompeten dalam perancangan, pembuatan, dan pemeliharaan mesin untuk industri modern.',
                'gambar' => 'mesin.jpg',
                'kepala_jurusan' => 'Ir. Budi Santoso, M.T.',
                'nip_kepala' => '198504042010011004',
                'akreditasi' => 'B',
                'jenjang' => 'S1',
                'durasi_studi' => 8,
                'prospek_karir' => 'Mechanical Engineer, Manufacturing Engineer, Automotive Engineer, HVAC Engineer, Maintenance Engineer, Design Engineer, Quality Control Engineer',
                'is_active' => true,
            ],
            [
                'nama' => 'Arsitektur',
                'kode' => 'ARS',
                'deskripsi' => 'Program studi yang mempelajari perancangan arsitektur, desain bangunan, dan perencanaan ruang yang berkelanjutan.',
                'visi' => 'Menjadi program studi unggulan dalam pengembangan arsitektur berkelanjutan yang berwawasan lingkungan.',
                'misi' => '1. Menyelenggarakan pendidikan tinggi berkualitas dalam bidang arsitektur\n2. Melakukan penelitian inovatif dalam pengembangan arsitektur berkelanjutan\n3. Melaksanakan pengabdian masyarakat melalui desain arsitektur\n4. Menjalin kerjasama dengan industri konstruksi dan real estate',
                'tujuan' => 'Menghasilkan lulusan yang kompeten dalam perancangan arsitektur yang berkelanjutan dan berwawasan lingkungan.',
                'gambar' => 'ars.jpg',
                'kepala_jurusan' => 'Ir. Siti Nurhaliza, M.Ars.',
                'nip_kepala' => '198505052010012005',
                'akreditasi' => 'B',
                'jenjang' => 'S1',
                'durasi_studi' => 8,
                'prospek_karir' => 'Architect, Interior Designer, Urban Planner, Landscape Architect, Building Designer, Project Manager, Consultant',
                'is_active' => true,
            ],
            [
                'nama' => 'Teknik Bangunan',
                'kode' => 'PTB',
                'deskripsi' => 'Program studi yang mempelajari teknologi konstruksi, manajemen proyek, dan pengembangan infrastruktur.',
                'visi' => 'Menjadi program studi terdepan dalam pengembangan teknologi konstruksi dan manajemen proyek.',
                'misi' => '1. Menyelenggarakan pendidikan tinggi berkualitas dalam bidang teknik bangunan\n2. Melakukan penelitian inovatif dalam pengembangan teknologi konstruksi\n3. Melaksanakan pengabdian masyarakat melalui manajemen proyek\n4. Menjalin kerjasama dengan industri konstruksi dan pengembangan properti',
                'tujuan' => 'Menghasilkan lulusan yang kompeten dalam teknologi konstruksi dan manajemen proyek pembangunan.',
                'gambar' => 'PTB.jpg',
                'kepala_jurusan' => 'Ir. Muhammad Ali, M.T.',
                'nip_kepala' => '198506062010011006',
                'akreditasi' => 'B',
                'jenjang' => 'S1',
                'durasi_studi' => 8,
                'prospek_karir' => 'Construction Engineer, Project Manager, Building Inspector, Cost Estimator, Construction Supervisor, Quality Control Engineer, Safety Engineer',
                'is_active' => true,
            ],
        ];

        foreach ($jurusans as $jurusan) {
            Jurusan::create($jurusan);
        }
    }
} 