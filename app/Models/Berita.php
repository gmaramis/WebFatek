<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul', 'slug', 'isi', 'gambar', 'tanggal'
    ];

    public function getImageUrlAttribute()
    {
        return $this->gambar ? asset('storage/' . $this->gambar) : null;
    }
}
