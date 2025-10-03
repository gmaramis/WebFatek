<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasis';

    // Izinkan mass assignment untuk kolom berikut
    protected $fillable = [
        'title',
        'subtitle',
        'image_path',
    ];
}
