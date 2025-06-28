<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

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
        'tanggal_posting' => 'datetime',
        'tanggal_berakhir' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
