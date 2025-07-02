<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StrukturPimpinan;

class StrukturPimpinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        StrukturPimpinan::truncate();

        // Data Dekan
        StrukturPimpinan::create([
            'nama' => 'Dr. Ir. JOHAN REVO UNTUNG, M.T.',
            'jabatan' => 'Dekan',
            'nip' => '196501011990031001',
            'pendidikan_terakhir' => 'Doktor Teknik',
            'foto' => null,
            'urutan' => 1,
            'level' => 'dekan',
            'bidang' => null,
            'is_active' => true,
        ]);

        // Data Wakil Dekan
        StrukturPimpinan::create([
            'nama' => 'Dr. Ir. RUDY TAMBUNAN, M.T.',
            'jabatan' => 'Wakil Dekan I',
            'nip' => '196502021990031002',
            'pendidikan_terakhir' => 'Doktor Teknik',
            'foto' => null,
            'urutan' => 1,
            'level' => 'wakil_dekan',
            'bidang' => 'Bidang Akademik',
            'is_active' => true,
        ]);

        StrukturPimpinan::create([
            'nama' => 'Dr. Ir. ALEXANDER KARUNDENG, M.T.',
            'jabatan' => 'Wakil Dekan II',
            'nip' => '196506061990031006',
            'pendidikan_terakhir' => 'Doktor Teknik',
            'foto' => null,
            'urutan' => 2,
            'level' => 'wakil_dekan',
            'bidang' => 'Bidang Umum & Keuangan',
            'is_active' => true,
        ]);

        StrukturPimpinan::create([
            'nama' => 'Dr. Ir. JOHANES BAMBANG, M.T.',
            'jabatan' => 'Wakil Dekan III',
            'nip' => '196509091990031009',
            'pendidikan_terakhir' => 'Doktor Teknik',
            'foto' => null,
            'urutan' => 3,
            'level' => 'wakil_dekan',
            'bidang' => 'Bidang Kemahasiswaan & Kerjasama',
            'is_active' => true,
        ]);

        // Data Kepala Jurusan (contoh)
        StrukturPimpinan::create([
            'nama' => 'Dr. Ir. KEPALA JURUSAN 1, M.T.',
            'jabatan' => 'Kepala Jurusan Teknik Sipil',
            'nip' => '198001011990031001',
            'pendidikan_terakhir' => 'Doktor Teknik',
            'foto' => null,
            'urutan' => 1,
            'level' => 'kepala_jurusan',
            'bidang' => 'Teknik Sipil',
            'is_active' => true,
        ]);

        StrukturPimpinan::create([
            'nama' => 'Dr. Ir. KEPALA JURUSAN 2, M.T.',
            'jabatan' => 'Kepala Jurusan Teknik Mesin',
            'nip' => '198002021990031002',
            'pendidikan_terakhir' => 'Doktor Teknik',
            'foto' => null,
            'urutan' => 2,
            'level' => 'kepala_jurusan',
            'bidang' => 'Teknik Mesin',
            'is_active' => true,
        ]);

        StrukturPimpinan::create([
            'nama' => 'Dr. Ir. KEPALA JURUSAN 3, M.T.',
            'jabatan' => 'Kepala Jurusan Arsitektur',
            'nip' => '198003031990031003',
            'pendidikan_terakhir' => 'Doktor Teknik',
            'foto' => null,
            'urutan' => 3,
            'level' => 'kepala_jurusan',
            'bidang' => 'Arsitektur',
            'is_active' => true,
        ]);
    }
} 