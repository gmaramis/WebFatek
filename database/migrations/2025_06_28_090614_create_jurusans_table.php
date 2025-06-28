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
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode');
            $table->text('deskripsi');
            $table->text('visi');
            $table->text('misi');
            $table->text('tujuan');
            $table->string('gambar');
            $table->string('kepala_jurusan')->nullable();
            $table->string('nip_kepala')->nullable();
            $table->string('akreditasi')->nullable();
            $table->string('jenjang'); // S1, D3, D4
            $table->integer('durasi_studi'); // dalam semester
            $table->text('prospek_karir');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
