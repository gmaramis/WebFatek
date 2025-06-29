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
        Schema::create('jadwal_akademiks', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_jadwal'); // semester_ganjil, semester_genap, uts, libur_akademik, wisuda, pendaftaran
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('warna')->default('blue'); // blue, green, yellow, red, orange, purple, teal, indigo
            $table->string('icon')->nullable(); // FontAwesome icon class
            $table->json('periode')->nullable(); // JSON untuk menyimpan periode (contoh: {"mulai": "Agustus", "selesai": "Desember"})
            $table->json('jadwal_detail')->nullable(); // JSON untuk menyimpan detail jadwal
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
        Schema::dropIfExists('jadwal_akademiks');
    }
};
