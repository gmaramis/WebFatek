<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Berita extends Model
{
    use Searchable;

    protected $fillable = ['judul', 'slug', 'isi', 'gambar', 'tanggal'];

    public function toSearchableArray(): array
    {
        return [
            'id'      => $this->id,
            'judul'   => $this->judul,
            'isi'     => strip_tags($this->isi),
            'slug'    => $this->slug,
            'tanggal' => optional($this->tanggal)->toDateString(),
            'type'    => 'berita',
        ];
    }
}