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
        Schema::create('magang_kkns', function (Blueprint $table) {
            $table->id();
            $table->string('jenis')->default('magang'); // magang atau kkn
            $table->string('judul');
            $table->text('deskripsi');
            $table->text('manfaat')->nullable();
            $table->string('statistik_1_label')->nullable();
            $table->string('statistik_1_nilai')->nullable();
            $table->string('statistik_2_label')->nullable();
            $table->string('statistik_2_nilai')->nullable();
            $table->string('statistik_3_label')->nullable();
            $table->string('statistik_3_nilai')->nullable();
            $table->string('statistik_4_label')->nullable();
            $table->string('statistik_4_nilai')->nullable();
            $table->text('bidang_program')->nullable();
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
        Schema::dropIfExists('magang_kkns');
    }
};
