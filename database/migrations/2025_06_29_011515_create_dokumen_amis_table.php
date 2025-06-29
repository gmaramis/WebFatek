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
        Schema::create('dokumen_amis', function (Blueprint $table) {
            $table->id();
            $table->string('program_studi');
            $table->integer('tahun');
            $table->string('judul_dokumen');
            $table->text('deskripsi')->nullable();
            $table->string('file_dokumen')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_size')->nullable();
            $table->string('format_file')->nullable();
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
        Schema::dropIfExists('dokumen_amis');
    }
};
