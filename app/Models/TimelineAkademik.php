<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineAkademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'bulan',
        'tahun',
        'warna',
        'icon',
        'status',
        'urutan',
        'catatan'
    ];

    // Scope untuk timeline yang aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk mengurutkan berdasarkan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('tahun')->orderBy('bulan');
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

    // Accessor untuk warna CSS class
    public function getWarnaClassAttribute()
    {
        return match($this->warna) {
            'blue' => 'blue',
            'green' => 'green',
            'yellow' => 'yellow',
            'red' => 'red',
            'orange' => 'orange',
            'purple' => 'purple',
            default => 'blue',
        };
    }

    // Accessor untuk format bulan tahun
    public function getBulanTahunAttribute()
    {
        return $this->bulan . ' ' . $this->tahun;
    }
}
