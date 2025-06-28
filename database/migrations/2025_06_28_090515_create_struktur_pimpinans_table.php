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
        Schema::create('struktur_pimpinans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('nip')->nullable();
            $table->text('pendidikan_terakhir')->nullable();
            $table->string('foto')->nullable();
            $table->integer('urutan');
            $table->string('level'); // dekan, wakil_dekan, kepala_jurusan
            $table->string('bidang')->nullable(); // untuk wakil dekan
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struktur_pimpinans');
    }
};
