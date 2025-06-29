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
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('jurusan');
            $table->string('issn')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('periode_terbit')->nullable(); // 2x per tahun, 4x per tahun, dll
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->text('scope')->nullable(); // Ruang lingkup jurnal
            $table->text('panduan_penulisan')->nullable();
            $table->string('status')->default('aktif'); // aktif, nonaktif
            $table->integer('urutan')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnals');
    }
};
