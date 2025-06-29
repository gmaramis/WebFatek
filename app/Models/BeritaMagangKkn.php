<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaMagangKkn extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'gambar',
        'tanggal_posting',
        'penulis',
        'konten_lengkap',
        'link_eksternal',
        'is_active',
        'urutan',
    ];

    protected $casts = [
        'tanggal_posting' => 'date',
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeMagang($query)
    {
        return $query->where('kategori', 'magang');
    }

    public function scopeKkn($query)
    {
        return $query->where('kategori', 'kkn');
    }

    public function scopeUmum($query)
    {
        return $query->where('kategori', 'umum');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('tanggal_posting', 'desc');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('tanggal_posting', 'desc');
    }
}
