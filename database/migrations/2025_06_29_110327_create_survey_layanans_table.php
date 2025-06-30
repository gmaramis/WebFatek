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
        Schema::create('survey_layanans', function (Blueprint $table) {
            $table->id();
            
            // Informasi Responden
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('telepon');
            $table->enum('kategori_responden', ['mahasiswa', 'dosen', 'tenaga_kependidikan', 'alumni', 'pemangku_kepentingan']);
            $table->string('program_studi')->nullable(); // untuk mahasiswa/alumni
            $table->string('unit_kerja')->nullable(); // untuk dosen/tenaga kependidikan
            
            // Informasi Layanan
            $table->enum('jenis_layanan', [
                'akademik',
                'kemahasiswaan', 
                'keuangan',
                'sarana_prasarana',
                'teknologi_informasi',
                'kerjasama',
                'umum',
                'lainnya'
            ]);
            $table->string('layanan_spesifik'); // detail layanan yang dinilai
            $table->date('tanggal_layanan');
            
            // Penilaian Layanan (1-5)
            $table->integer('kemudahan_akses')->comment('1-5');
            $table->integer('kecepatan_pelayanan')->comment('1-5');
            $table->integer('keramahan_petugas')->comment('1-5');
            $table->integer('kejelasan_informasi')->comment('1-5');
            $table->integer('kualitas_hasil')->comment('1-5');
            $table->integer('kepuasan_keseluruhan')->comment('1-5');
            
            // Feedback
            $table->text('komentar_positif')->nullable();
            $table->text('komentar_negatif')->nullable();
            $table->text('saran_perbaikan')->nullable();
            
            // Status
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            
            $table->timestamps();
            
            // Indexes
            $table->index(['kategori_responden', 'jenis_layanan']);
            $table->index('tanggal_layanan');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_layanans');
    }
};
