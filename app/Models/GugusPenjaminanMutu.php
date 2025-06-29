<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GugusPenjaminanMutu extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_studi',
        'nama_gpm',
        'gelar',
        'email',
        'telepon',
        'deskripsi',
        'foto',
        'is_active',
        'urutan'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    // Scope untuk GPM yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk mengurutkan berdasarkan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('created_at', 'desc');
    }

    // Accessor untuk nama lengkap dengan gelar
    public function getNamaLengkapAttribute()
    {
        return $this->nama_gpm . ($this->gelar ? ', ' . $this->gelar : '');
    }

    // Accessor untuk program studi yang diformat
    public function getProgramStudiFormattedAttribute()
    {
        return match($this->program_studi) {
            'ti' => 'Teknik Informatika',
            'ptik' => 'Pendidikan Teknik Informatika & Komputer',
            'ts' => 'Teknik Sipil',
            'tm' => 'Teknik Mesin',
            'te' => 'Teknik Elektro',
            'ars' => 'Arsitektur',
            'ptb' => 'Pendidikan Teknik Bangunan',
            'pkk' => 'Pendidikan Kesejahteraan Keluarga',
            default => ucwords(str_replace('-', ' ', $this->program_studi))
        };
    }

    // Accessor untuk foto dengan default
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->nama_gpm) . '&color=ea580c&background=fef3c7&size=160';
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
