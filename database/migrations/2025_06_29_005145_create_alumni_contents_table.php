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
        Schema::create('alumni_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section'); // hero, statistik, testimonial, galeri, dll
            $table->string('key'); // judul, deskripsi, statistik_1, dll
            $table->text('value'); // nilai konten
            $table->string('type')->default('text'); // text, number, image, html
            $table->string('image_url')->nullable(); // untuk konten gambar
            $table->integer('urutan')->default(1); // urutan tampilan
            $table->boolean('is_active')->default(true);
            $table->text('catatan')->nullable();
            $table->timestamps();
            
            // Index untuk performa
            $table->index(['section', 'key']);
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_contents');
    }
};
