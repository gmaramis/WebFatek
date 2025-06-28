<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('gelar')->nullable();
            $table->enum('pendidikan_terakhir', ['S1', 'S2', 'S3']);
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Tugas Belajar'])->default('Aktif');
            $table->enum('jurusan', [
                'teknik-informatika',
                'teknik-sipil', 
                'teknik-elektro',
                'teknik-mesin',
                'arsitektur',
                'teknik-bangunan'
            ]);
            $table->text('bidang_keahlian')->nullable();
            $table->string('email')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
