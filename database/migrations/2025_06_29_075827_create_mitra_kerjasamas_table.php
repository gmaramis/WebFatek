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
        Schema::create('mitra_kerjasamas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instansi');
            $table->text('deskripsi')->nullable();
            $table->string('kategori'); // Perusahaan, Universitas, Pemerintah, Lembaga Penelitian, Organisasi
            $table->string('jurusan'); // Teknik Informatika, Teknik Sipil, dll
            $table->text('bentuk_kerjasama');
            $table->string('alamat')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->string('logo')->nullable();
            $table->date('tanggal_mou')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->enum('status', ['aktif', 'nonaktif', 'pending'])->default('aktif');
            $table->integer('urutan')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra_kerjasamas');
    }
};
