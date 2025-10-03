<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Pengumuman extends Model
{
    use HasFactory, Searchable;

    protected $table = 'pengumumans';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal_posting',
        'tanggal_berakhir',
        'status',
        'kategori',
        'file_lampiran',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'tanggal_posting'  => 'datetime',
        'tanggal_berakhir' => 'datetime',
    ];

    public function toSearchableArray(): array
    {
        return [
            'id'              => $this->id,
            'judul'           => $this->judul,
            'isi'             => strip_tags($this->isi),
            'kategori'        => $this->kategori,
            'tanggal_posting' => optional($this->tanggal_posting)->toDateString(),
            'type'            => 'pengumuman',
        ];
    }
}