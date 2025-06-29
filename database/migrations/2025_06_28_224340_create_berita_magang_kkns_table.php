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
        Schema::create('berita_magang_kkns', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('kategori')->default('magang'); // magang, kkn, umum
            $table->string('gambar')->nullable();
            $table->date('tanggal_posting');
            $table->string('penulis')->nullable();
            $table->text('konten_lengkap')->nullable();
            $table->string('link_eksternal')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('urutan')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_magang_kkns');
    }
};
