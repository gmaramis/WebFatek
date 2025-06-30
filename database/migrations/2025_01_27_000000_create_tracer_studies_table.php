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
        Schema::create('tracer_studies', function (Blueprint $table) {
            $table->id();
            
            // Informasi Pribadi
            $table->string('nama_lengkap');
            $table->string('nim')->unique();
            $table->string('program_studi');
            $table->year('tahun_lulus');
            $table->string('email');
            $table->string('telepon');
            $table->decimal('ipk', 3, 2)->nullable();
            $table->text('alamat')->nullable();
            
            // Informasi Pekerjaan
            $table->enum('status_pekerjaan', ['bekerja', 'wirausaha', 'belum_bekerja', 'lanjut_studi']);
            $table->integer('waktu_tunggu_kerja')->nullable(); // dalam bulan
            $table->string('nama_perusahaan')->nullable();
            $table->string('jabatan')->nullable();
            $table->decimal('gaji', 10, 2)->nullable(); // dalam juta
            $table->enum('kesesuaian_bidang', ['sangat_sesuai', 'sesuai', 'kurang_sesuai', 'tidak_sesuai'])->nullable();
            $table->string('jenis_perusahaan')->nullable();
            $table->string('bidang_pekerjaan')->nullable();
            
            // Informasi Pencarian Kerja
            $table->string('sumber_informasi_lowongan')->nullable();
            $table->string('metode_mencari_kerja')->nullable();
            $table->integer('lamanya_mencari_kerja')->nullable(); // dalam bulan
            $table->integer('jumlah_lamaran')->nullable();
            $table->integer('jumlah_wawancara')->nullable();
            
            // Informasi Tambahan
            $table->text('alasan_belum_bekerja')->nullable();
            $table->text('rencana_kedepan')->nullable();
            $table->text('kompetensi_yang_dibutuhkan')->nullable();
            $table->text('kompetensi_yang_dimiliki')->nullable();
            
            // Survey Kepuasan
            $table->integer('kepuasan_kurikulum')->nullable(); // 1-5
            $table->integer('relevansi_ilmu')->nullable(); // 1-5
            $table->text('saran_pengembangan')->nullable();
            $table->text('saran_untuk_almamater')->nullable();
            
            // Status
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            
            $table->timestamps();
            
            // Indexes
            $table->index(['program_studi', 'tahun_lulus']);
            $table->index('status_pekerjaan');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracer_studies');
    }
}; 