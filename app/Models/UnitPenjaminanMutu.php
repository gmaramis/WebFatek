<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitPenjaminanMutu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_ketua',
        'gelar',
        'jabatan',
        'email',
        'telepon',
        'deskripsi',
        'foto',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope untuk UPM yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Accessor untuk nama lengkap dengan gelar
    public function getNamaLengkapAttribute()
    {
        return $this->nama_ketua . ($this->gelar ? ', ' . $this->gelar : '');
    }

    // Accessor untuk foto dengan default
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->nama_ketua) . '&color=ea580c&background=fef3c7&size=160';
    }

    // Accessor untuk status aktif label
    public function getStatusLabelAttribute()
    {
        return $this->is_active ? 'Aktif' : 'Nonaktif';
    }

    // Accessor untuk status aktif color
    public function getStatusColorAttribute()
    {
        return $this->is_active ? 'success' : 'danger';
    }
}
