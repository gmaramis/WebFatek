<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebijakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'isi',
        'kategori',
        'file_dokumen',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Accessor untuk updated_at yang aman
    public function getUpdatedAtFormattedAttribute()
    {
        if (!$this->updated_at) {
            return null;
        }
        try {
            return \Illuminate\Support\Carbon::parse((string) $this->updated_at)->format('d M Y');
        } catch (\Exception $e) {
            return (string) $this->updated_at;
        }
    }
}
