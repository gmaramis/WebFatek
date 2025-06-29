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
        Schema::create('pedoman_akademiks', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('file_url')->nullable(); // URL Google Drive
            $table->string('file_name')->nullable(); // Nama file
            $table->string('file_size')->nullable(); // Ukuran file
            $table->integer('jumlah_halaman')->nullable(); // Jumlah halaman
            $table->string('format_file')->default('PDF'); // Format file
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
        Schema::dropIfExists('pedoman_akademiks');
    }
};
