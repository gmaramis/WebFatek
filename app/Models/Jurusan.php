<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Jurusan extends Model
{
    use HasFactory, Searchable;

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

    protected $casts = ['is_active' => 'boolean', 'durasi_studi' => 'integer'];

    public function toSearchableArray(): array
    {
        return [
            'id'         => $this->id,
            'nama'       => $this->nama,
            'deskripsi'  => strip_tags((string) $this->deskripsi),
            'jenjang'    => $this->jenjang,
            'akreditasi' => $this->akreditasi,
            'type'       => 'jurusan',
        ];
    }
}