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
        Schema::create('gugus_penjaminan_mutus', function (Blueprint $table) {
            $table->id();
            $table->string('program_studi');
            $table->string('nama_gpm');
            $table->string('gelar')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('gugus_penjaminan_mutus');
    }
};
