<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Call other seeders
        $this->call([
            UserSeeder::class,
            VisiMisiSeeder::class,
            KebijakanSeeder::class,
            DosenSeeder::class,
            JurusanSeeder::class,
            BeritaSeeder::class,
            PengumumanSeeder::class,
            PedomanAkademikSeeder::class,
            KalenderAkademikSeeder::class,
            TimelineAkademikSeeder::class,
            JadwalAkademikSeeder::class,
            OrmawaSeeder::class,
            AlumniSeeder::class,
            AlumniContentSeeder::class,
            UnitPenjaminanMutuSeeder::class,
            GugusPenjaminanMutuSeeder::class,
            DokumenAmiSeeder::class,
            JurnalSeeder::class,
            MitraKerjasamaSeeder::class,
            P3rpmContentSeeder::class,
        ]);
    }
}
