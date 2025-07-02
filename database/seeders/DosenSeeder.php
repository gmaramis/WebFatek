<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosens = [
            // Teknik Informatika
            [
                'nip' => '196501011990031001',
                'nama' => 'JOHAN REVO UNTUNG',
                'gelar' => 'Dr. Ir.',
                'pendidikan_terakhir' => 'S3',
                'status' => 'Aktif',
                'jurusan' => 'teknik-informatika',
                'bidang_keahlian' => 'Sistem Informasi, Database, Web Development',
                'email' => 'johan.revo@unima.ac.id',
                'is_active' => true,
            ],
            [
                'nip' => '196502021990031002',
                'nama' => 'RUDY TAMBUNAN',
                'gelar' => 'Dr. Ir.',
                'pendidikan_terakhir' => 'S3',
                'status' => 'Aktif',
                'jurusan' => 'teknik-informatika',
                'bidang_keahlian' => 'Artificial Intelligence, Machine Learning',
                'email' => 'rudy.tambunan@unima.ac.id',
                'is_active' => true,
            ],
            [
                'nip' => '196503031990031003',
                'nama' => 'FRANSISKUS XAVIER RUMBIA',
                'gelar' => 'Ir.',
                'pendidikan_terakhir' => 'S2',
                'status' => 'Aktif',
                'jurusan' => 'teknik-informatika',
                'bidang_keahlian' => 'Software Engineering, Programming',
                'email' => 'fransiskus.rumbia@unima.ac.id',
                'is_active' => true,
            ],
            [
                'nip' => '196504041990031004',
                'nama' => 'HENDRIKUS JULUNG',
                'gelar' => 'Ir.',
                'pendidikan_terakhir' => 'S2',
                'status' => 'Aktif',
                'jurusan' => 'teknik-informatika',
                'bidang_keahlian' => 'Computer Networks, Cybersecurity',
                'email' => 'hendrikus.julung@unima.ac.id',
                'is_active' => true,
            ],
            [
                'nip' => '196505051990031005',
                'nama' => 'JOHANES BAMBANG',
                'gelar' => 'Ir.',
                'pendidikan_terakhir' => 'S2',
                'status' => 'Aktif',
                'jurusan' => 'teknik-informatika',
                'bidang_keahlian' => 'Mobile Development, UI/UX Design',
                'email' => 'johanes.bambang@unima.ac.id',
                'is_active' => true,
            ],

            // Teknik Sipil
            [
                'nip' => '196506061990031006',
                'nama' => 'ALEXANDER KARUNDENG',
                'gelar' => 'Dr. Ir.',
                'pendidikan_terakhir' => 'S3',
                'status' => 'Aktif',
                'jurusan' => 'teknik-sipil',
                'bidang_keahlian' => 'Struktur Beton, Konstruksi Bangunan',
                'email' => 'alexander.karundeng@unima.ac.id',
                'is_active' => true,
            ],
            [
                'nip' => '196507071990031007',
                'nama' => 'FRANSISKUS RUMBIA',
                'gelar' => 'Ir.',
                'pendidikan_terakhir' => 'S2',
                'status' => 'Aktif',
                'jurusan' => 'teknik-sipil',
                'bidang_keahlian' => 'Transportasi, Perencanaan Jalan',
                'email' => 'fransiskus.rumbia.sipil@unima.ac.id',
                'is_active' => true,
            ],
            [
                'nip' => '196508081990031008',
                'nama' => 'HENDRIKUS JULUNG',
                'gelar' => 'Ir.',
                'pendidikan_terakhir' => 'S2',
                'status' => 'Aktif',
                'jurusan' => 'teknik-sipil',
                'bidang_keahlian' => 'Geoteknik, Pondasi',
                'email' => 'hendrikus.julung.sipil@unima.ac.id',
                'is_active' => true,
            ],

            // Teknik Elektro
            [
                'nip' => '196509091990031009',
                'nama' => 'JOHANES BAMBANG',
                'gelar' => 'Dr. Ir.',
                'pendidikan_terakhir' => 'S3',
                'status' => 'Aktif',
                'jurusan' => 'teknik-elektro',
                'bidang_keahlian' => 'Sistem Tenaga, Elektronika Daya',
                'email' => 'johanes.bambang.elektro@unima.ac.id',
                'is_active' => true,
            ],
            [
                'nip' => '196510101990031010',
                'nama' => 'ALEXANDER KARUNDENG',
                'gelar' => 'Ir.',
                'pendidikan_terakhir' => 'S2',
                'status' => 'Aktif',
                'jurusan' => 'teknik-elektro',
                'bidang_keahlian' => 'Kontrol Otomatis, Instrumentasi',
                'email' => 'alexander.karundeng.elektro@unima.ac.id',
                'is_active' => true,
            ],

            // Teknik Mesin
            [
                'nip' => '196511111990031011',
                'nama' => 'FRANSISKUS XAVIER RUMBIA',
                'gelar' => 'Dr. Ir.',
                'pendidikan_terakhir' => 'S3',
                'status' => 'Aktif',
                'jurusan' => 'teknik-mesin',
                'bidang_keahlian' => 'Termodinamika, Mesin Konversi Energi',
                'email' => 'fransiskus.rumbia.mesin@unima.ac.id',
                'is_active' => true,
            ],
            [
                'nip' => '196512121990031012',
                'nama' => 'HENDRIKUS JULUNG',
                'gelar' => 'Ir.',
                'pendidikan_terakhir' => 'S2',
                'status' => 'Aktif',
                'jurusan' => 'teknik-mesin',
                'bidang_keahlian' => 'Mekanika Fluida, Perpindahan Panas',
                'email' => 'hendrikus.julung.mesin@unima.ac.id',
                'is_active' => true,
            ],

            // Arsitektur
            [
                'nip' => '196513131990031013',
                'nama' => 'JOHAN REVO UNTUNG',
                'gelar' => 'Dr. Ir.',
                'pendidikan_terakhir' => 'S3',
                'status' => 'Aktif',
                'jurusan' => 'arsitektur',
                'bidang_keahlian' => 'Arsitektur Berkelanjutan, Urban Design',
                'email' => 'johan.revo.arsitektur@unima.ac.id',
                'is_active' => true,
            ],

            // Teknik Bangunan
            [
                'nip' => '196514141990031014',
                'nama' => 'RUDY TAMBUNAN',
                'gelar' => 'Ir.',
                'pendidikan_terakhir' => 'S2',
                'status' => 'Aktif',
                'jurusan' => 'teknik-bangunan',
                'bidang_keahlian' => 'Konstruksi Bangunan, Manajemen Proyek',
                'email' => 'rudy.tambunan.bangunan@unima.ac.id',
                'is_active' => true,
            ],
        ];

        foreach ($dosens as $dosen) {
            Dosen::firstOrCreate(
                ['nip' => $dosen['nip']], // Cari berdasarkan NIP
                $dosen
            );
        }
    }
}
