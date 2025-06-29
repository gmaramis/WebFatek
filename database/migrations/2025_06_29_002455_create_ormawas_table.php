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
        Schema::create('ormawas', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['bem', 'himpunan', 'ukm'])->comment('Jenis organisasi: BEM, Himpunan Jurusan, atau UKM');
            $table->string('nama')->comment('Nama organisasi');
            $table->string('singkatan')->nullable()->comment('Singkatan organisasi (contoh: HMTI, BEM)');
            $table->text('deskripsi')->comment('Deskripsi organisasi');
            $table->string('ketua')->nullable()->comment('Nama ketua organisasi');
            $table->string('email')->nullable()->comment('Email kontak organisasi');
            $table->string('telepon')->nullable()->comment('Nomor telepon kontak');
            $table->string('lokasi')->nullable()->comment('Lokasi kantor/ruang organisasi');
            $table->string('website')->nullable()->comment('Website organisasi jika ada');
            $table->string('instagram')->nullable()->comment('Instagram organisasi');
            $table->string('facebook')->nullable()->comment('Facebook organisasi');
            $table->string('youtube')->nullable()->comment('YouTube organisasi');
            $table->string('warna')->default('orange')->comment('Warna tema organisasi');
            $table->string('icon')->nullable()->comment('Icon FontAwesome untuk organisasi');
            $table->integer('urutan')->default(1)->comment('Urutan tampilan');
            $table->boolean('is_active')->default(true)->comment('Status aktif organisasi');
            $table->json('prestasi')->nullable()->comment('Daftar prestasi organisasi dalam format JSON');
            $table->json('program_unggulan')->nullable()->comment('Program unggulan organisasi dalam format JSON');
            $table->text('catatan')->nullable()->comment('Catatan tambahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ormawas');
    }
};
