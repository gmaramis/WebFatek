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
        Schema::create('kalender_akademiks', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('tahun_akademik');
            $table->string('pdf_url')->nullable(); // URL Google Drive untuk PDF
            $table->string('jpg_url')->nullable(); // URL Google Drive untuk JPG
            $table->string('pdf_name')->nullable(); // Nama file PDF
            $table->string('jpg_name')->nullable(); // Nama file JPG
            $table->string('pdf_size')->nullable(); // Ukuran file PDF
            $table->string('jpg_size')->nullable(); // Ukuran file JPG
            $table->date('tanggal_update')->nullable(); // Tanggal update terakhir
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->integer('urutan')->default(1); // Untuk mengatur urutan tampilan
            $table->text('catatan')->nullable(); // Catatan tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalender_akademiks');
    }
};
