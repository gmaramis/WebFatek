<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenAmi extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_studi',
        'tahun',
        'judul_dokumen',
        'deskripsi',
        'file_dokumen',
        'file_name',
        'file_size',
        'format_file',
        'link_eksternal',
        'is_active',
        'urutan'
    ];

    protected $casts = [
        'tahun' => 'integer',
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    // Scope untuk dokumen yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk mengurutkan berdasarkan tahun dan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('tahun', 'desc')->orderBy('urutan')->orderBy('created_at', 'desc');
    }

    // Scope untuk filter berdasarkan tahun
    public function scopeByTahun($query, $tahun)
    {
        return $query->where('tahun', $tahun);
    }

    // Scope untuk filter berdasarkan program studi
    public function scopeByProgramStudi($query, $programStudi)
    {
        return $query->where('program_studi', $programStudi);
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

    // Accessor untuk file URL
    public function getFileUrlAttribute()
    {
        if ($this->file_dokumen) {
            return asset('storage/' . $this->file_dokumen);
        }
        return $this->link_eksternal;
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
