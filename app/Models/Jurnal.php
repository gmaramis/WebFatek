<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'jurusan',
        'issn',
        'penerbit',
        'periode_terbit',
        'website',
        'email',
        'scope',
        'panduan_penulisan',
        'status',
        'urutan'
    ];

    // Scope untuk jurnal yang aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk mengurutkan berdasarkan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('created_at', 'desc');
    }

    // Scope untuk filter berdasarkan jurusan
    public function scopeByJurusan($query, $jurusan)
    {
        return $query->where('jurusan', $jurusan);
    }

    // Accessor untuk status label
    public function getStatusLabelAttribute()
    {
        return $this->status === 'aktif' ? 'Aktif' : 'Nonaktif';
    }

    // Accessor untuk status badge color
    public function getStatusColorAttribute()
    {
        return $this->status === 'aktif' ? 'success' : 'danger';
    }

    // Accessor untuk jurusan label
    public function getJurusanLabelAttribute()
    {
        return ucwords(str_replace('-', ' ', $this->jurusan));
    }

    // Accessor untuk jurusan badge color
    public function getJurusanColorAttribute()
    {
        return match ($this->jurusan) {
            'teknik-informatika' => 'primary',
            'teknik-sipil' => 'success',
            'teknik-elektro' => 'warning',
            'teknik-mesin' => 'danger',
            'arsitektur' => 'secondary',
            'teknik-bangunan' => 'info',
            default => 'secondary',
        };
    }
}
