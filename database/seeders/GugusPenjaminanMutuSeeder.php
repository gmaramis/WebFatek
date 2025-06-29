<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GugusPenjaminanMutu;

class GugusPenjaminanMutuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gpmData = [
            [
                'program_studi' => 'ti',
                'nama_gpm' => 'Dr. John Doe',
                'gelar' => 'M.Kom',
                'email' => 'john.doe@unima.ac.id',
                'telepon' => '+62-812-3456-7890',
                'deskripsi' => 'GPM Program Studi Teknik Informatika',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'program_studi' => 'ts',
                'nama_gpm' => 'Ir. Jane Smith',
                'gelar' => 'M.T.',
                'email' => 'jane.smith@unima.ac.id',
                'telepon' => '+62-812-3456-7891',
                'deskripsi' => 'GPM Program Studi Teknik Sipil',
                'urutan' => 2,
                'is_active' => true,
            ],
            [
                'program_studi' => 'te',
                'nama_gpm' => 'Dr. Albertus',
                'gelar' => 'S.T., M.Eng',
                'email' => 'albertus@unima.ac.id',
                'telepon' => '+62-812-3456-7892',
                'deskripsi' => 'GPM Program Studi Teknik Elektro',
                'urutan' => 3,
                'is_active' => true,
            ],
            [
                'program_studi' => 'tm',
                'nama_gpm' => 'Ir. Budi Santoso',
                'gelar' => 'M.T.',
                'email' => 'budi.santoso@unima.ac.id',
                'telepon' => '+62-812-3456-7893',
                'deskripsi' => 'GPM Program Studi Teknik Mesin',
                'urutan' => 4,
                'is_active' => true,
            ],
            [
                'program_studi' => 'ars',
                'nama_gpm' => 'Ir. Siti Nurhaliza',
                'gelar' => 'M.Ars',
                'email' => 'siti.nurhaliza@unima.ac.id',
                'telepon' => '+62-812-3456-7894',
                'deskripsi' => 'GPM Program Studi Arsitektur',
                'urutan' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($gpmData as $gpm) {
            GugusPenjaminanMutu::create($gpm);
        }
    }
}
