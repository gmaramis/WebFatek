<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'deskripsi',
        'visi',
        'misi',
        'tujuan',
        'gambar',
        'kepala_jurusan',
        'nip_kepala',
        'akreditasi',
        'jenjang',
        'durasi_studi',
        'prospek_karir',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'durasi_studi' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByJenjang($query, $jenjang)
    {
        return $query->where('jenjang', $jenjang);
    }
}
