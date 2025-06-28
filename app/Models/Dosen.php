<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'gelar',
        'pendidikan_terakhir',
        'status',
        'jurusan',
        'bidang_keahlian',
        'email',
        'foto',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByJurusan($query, $jurusan)
    {
        return $query->where('jurusan', $jurusan);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function getNamaLengkapAttribute()
    {
        return $this->gelar ? $this->gelar . ' ' . $this->nama : $this->nama;
    }

    public function getJurusanLabelAttribute()
    {
        $labels = [
            'teknik-informatika' => 'Teknik Informatika',
            'teknik-sipil' => 'Teknik Sipil',
            'teknik-elektro' => 'Teknik Elektro',
            'teknik-mesin' => 'Teknik Mesin',
            'arsitektur' => 'Arsitektur',
            'teknik-bangunan' => 'Teknik Bangunan',
        ];

        return $labels[$this->jurusan] ?? $this->jurusan;
    }
}
