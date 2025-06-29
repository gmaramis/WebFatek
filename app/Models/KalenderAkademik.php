<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderAkademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'tahun_akademik',
        'pdf_url',
        'jpg_url',
        'pdf_name',
        'jpg_name',
        'pdf_size',
        'jpg_size',
        'tanggal_update',
        'status',
        'urutan',
        'catatan'
    ];

    protected $casts = [
        'tanggal_update' => 'date',
    ];

    // Scope untuk kalender yang aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk mengurutkan berdasarkan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('created_at', 'desc');
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

    // Accessor untuk format file yang tersedia
    public function getAvailableFormatsAttribute()
    {
        $formats = [];
        if ($this->pdf_url) $formats[] = 'PDF';
        if ($this->jpg_url) $formats[] = 'JPG';
        return implode(', ', $formats);
    }
}
