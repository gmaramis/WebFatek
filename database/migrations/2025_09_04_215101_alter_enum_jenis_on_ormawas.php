<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            ALTER TABLE `ormawas`
            MODIFY `jenis`
            ENUM('bem','himpunan','ukm','dpm','kprm')
            COLLATE utf8mb4_unicode_ci NOT NULL
            COMMENT 'Jenis organisasi: BEM, Himpunan Jurusan, UKM, DPM, KPRM'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE `ormawas`
            MODIFY `jenis`
            ENUM('bem','himpunan','ukm')
            COLLATE utf8mb4_unicode_ci NOT NULL
            COMMENT 'Jenis organisasi: BEM, Himpunan Jurusan, UKM'
        ");
    }
};