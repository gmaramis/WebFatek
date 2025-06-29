<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'nama',
        'singkatan',
        'deskripsi',
        'ketua',
        'email',
        'telepon',
        'lokasi',
        'website',
        'instagram',
        'facebook',
        'youtube',
        'warna',
        'icon',
        'urutan',
        'is_active',
        'prestasi',
        'program_unggulan',
        'catatan'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'prestasi' => 'array',
        'program_unggulan' => 'array',
        'urutan' => 'integer'
    ];

    // Scope untuk organisasi yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk mengurutkan berdasarkan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('nama');
    }

    // Scope untuk filter berdasarkan jenis
    public function scopeByJenis($query, $jenis)
    {
        return $query->where('jenis', $jenis);
    }

    // Accessor untuk jenis label
    public function getJenisLabelAttribute()
    {
        return match($this->jenis) {
            'bem' => 'BEM',
            'himpunan' => 'Himpunan Jurusan',
            'ukm' => 'UKM',
            default => ucfirst($this->jenis)
        };
    }

    // Accessor untuk warna badge
    public function getWarnaBadgeAttribute()
    {
        return match($this->warna) {
            'blue' => 'primary',
            'green' => 'success',
            'yellow' => 'warning',
            'red' => 'danger',
            'purple' => 'secondary',
            'teal' => 'info',
            'indigo' => 'dark',
            default => 'orange'
        };
    }

    // Accessor untuk nama lengkap dengan singkatan
    public function getNamaLengkapAttribute()
    {
        if ($this->singkatan) {
            return $this->nama . ' (' . $this->singkatan . ')';
        }
        return $this->nama;
    }

    // Accessor untuk status label
    public function getStatusLabelAttribute()
    {
        return $this->is_active ? 'Aktif' : 'Nonaktif';
    }

    // Accessor untuk status color
    public function getStatusColorAttribute()
    {
        return $this->is_active ? 'success' : 'danger';
    }

    // Accessor untuk prestasi count
    public function getPrestasiCountAttribute()
    {
        return $this->prestasi ? count($this->prestasi) : 0;
    }

    // Accessor untuk program count
    public function getProgramCountAttribute()
    {
        return $this->program_unggulan ? count($this->program_unggulan) : 0;
    }
}
