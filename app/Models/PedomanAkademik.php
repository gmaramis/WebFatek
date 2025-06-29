<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedomanAkademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'file_url',
        'file_name',
        'file_size',
        'jumlah_halaman',
        'format_file',
        'tanggal_update',
        'status',
        'urutan',
        'catatan'
    ];

    protected $casts = [
        'tanggal_update' => 'date',
    ];

    // Scope untuk pedoman yang aktif
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

    // Accessor untuk tanggal update yang aman
    public function getTanggalUpdateFormattedAttribute()
    {
        if (!$this->tanggal_update) {
            return null;
        }
        try {
            return \Illuminate\Support\Carbon::parse((string) $this->tanggal_update)->format('d/m/Y');
        } catch (\Exception $e) {
            return (string) $this->tanggal_update;
        }
    }
}
