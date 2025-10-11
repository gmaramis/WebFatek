<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UnitPenjaminanMutu;

class UnitPenjaminanMutuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitPenjaminanMutu::create([
            'nama_ketua' => 'Prof. Dr. Meytij Jeanne Rampe',
            'gelar' => 'M.Si.',
            'jabatan' => 'Ketua Unit Penjaminan Mutu (UPM) Fakultas Teknik',
            'email' => 'upm.ft@unima.ac.id',
            'telepon' => '+62-431-123456 ext. 123',
            'deskripsi' => 'Bersama membangun budaya mutu di lingkungan Fakultas Teknik UNIMA untuk pendidikan yang unggul dan berdaya saing.',
            'is_active' => true,
        ]);
    }
}
