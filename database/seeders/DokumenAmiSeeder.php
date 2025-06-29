<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DokumenAmi;

class DokumenAmiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokumenData = [
            // 2024
            [
                'program_studi' => 'ti',
                'tahun' => 2024,
                'judul_dokumen' => 'Laporan Audit Mutu Internal 2024',
                'deskripsi' => 'Laporan AMI Program Studi Teknik Informatika Tahun 2024',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'program_studi' => 'ts',
                'tahun' => 2024,
                'judul_dokumen' => 'Laporan Audit Mutu Internal 2024',
                'deskripsi' => 'Laporan AMI Program Studi Teknik Sipil Tahun 2024',
                'urutan' => 2,
                'is_active' => true,
            ],
            [
                'program_studi' => 'te',
                'tahun' => 2024,
                'judul_dokumen' => 'Laporan Audit Mutu Internal 2024',
                'deskripsi' => 'Laporan AMI Program Studi Teknik Elektro Tahun 2024',
                'urutan' => 3,
                'is_active' => true,
            ],
            [
                'program_studi' => 'tm',
                'tahun' => 2024,
                'judul_dokumen' => 'Laporan Audit Mutu Internal 2024',
                'deskripsi' => 'Laporan AMI Program Studi Teknik Mesin Tahun 2024',
                'urutan' => 4,
                'is_active' => true,
            ],
            [
                'program_studi' => 'ars',
                'tahun' => 2024,
                'judul_dokumen' => 'Laporan Audit Mutu Internal 2024',
                'deskripsi' => 'Laporan AMI Program Studi Arsitektur Tahun 2024',
                'urutan' => 5,
                'is_active' => true,
            ],
            
            // 2023
            [
                'program_studi' => 'ti',
                'tahun' => 2023,
                'judul_dokumen' => 'Laporan Audit Mutu Internal 2023',
                'deskripsi' => 'Laporan AMI Program Studi Teknik Informatika Tahun 2023',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'program_studi' => 'ts',
                'tahun' => 2023,
                'judul_dokumen' => 'Laporan Audit Mutu Internal 2023',
                'deskripsi' => 'Laporan AMI Program Studi Teknik Sipil Tahun 2023',
                'urutan' => 2,
                'is_active' => true,
            ],
            [
                'program_studi' => 'te',
                'tahun' => 2023,
                'judul_dokumen' => 'Laporan Audit Mutu Internal 2023',
                'deskripsi' => 'Laporan AMI Program Studi Teknik Elektro Tahun 2023',
                'urutan' => 3,
                'is_active' => true,
            ],
            
            // 2022
            [
                'program_studi' => 'ti',
                'tahun' => 2022,
                'judul_dokumen' => 'Laporan Audit Mutu Internal 2022',
                'deskripsi' => 'Laporan AMI Program Studi Teknik Informatika Tahun 2022',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'program_studi' => 'ts',
                'tahun' => 2022,
                'judul_dokumen' => 'Laporan Audit Mutu Internal 2022',
                'deskripsi' => 'Laporan AMI Program Studi Teknik Sipil Tahun 2022',
                'urutan' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($dokumenData as $dokumen) {
            DokumenAmi::create($dokumen);
        }
    }
}
