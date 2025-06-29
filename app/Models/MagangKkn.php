<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagangKkn extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'judul',
        'deskripsi',
        'manfaat',
        'statistik_1_label',
        'statistik_1_nilai',
        'statistik_2_label',
        'statistik_2_nilai',
        'statistik_3_label',
        'statistik_3_nilai',
        'statistik_4_label',
        'statistik_4_nilai',
        'bidang_program',
        'is_active',
        'urutan',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeMagang($query)
    {
        return $query->where('jenis', 'magang');
    }

    public function scopeKkn($query)
    {
        return $query->where('jenis', 'kkn');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('created_at');
    }
}
