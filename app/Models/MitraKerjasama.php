<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraKerjasama extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instansi',
        'deskripsi',
        'kategori',
        'jurusan',
        'bentuk_kerjasama',
        'alamat',
        'website',
        'email',
        'telepon',
        'logo',
        'tanggal_mou',
        'tanggal_berakhir',
        'status',
        'urutan',
        'is_active'
    ];

    protected $casts = [
        'tanggal_mou' => 'date',
        'tanggal_berakhir' => 'date',
        'is_active' => 'boolean',
    ];

    // Scope untuk mitra yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk mengurutkan berdasarkan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('nama_instansi', 'asc');
    }

    // Scope untuk filter berdasarkan kategori
    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Scope untuk filter berdasarkan jurusan
    public function scopeByJurusan($query, $jurusan)
    {
        return $query->where('jurusan', $jurusan);
    }

    // Scope untuk filter berdasarkan status
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Accessor untuk status label
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'aktif' => 'Aktif',
            'nonaktif' => 'Nonaktif',
            'pending' => 'Pending',
            default => 'Tidak Diketahui',
        };
    }

    // Accessor untuk status badge color
    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            'aktif' => 'success',
            'nonaktif' => 'danger',
            'pending' => 'warning',
            default => 'secondary',
        };
    }

    // Accessor untuk kategori badge color
    public function getKategoriColorAttribute()
    {
        return match ($this->kategori) {
            'Perusahaan' => 'blue',
            'Universitas' => 'green',
            'Pemerintah' => 'purple',
            'Lembaga Penelitian' => 'orange',
            'Organisasi' => 'indigo',
            default => 'gray',
        };
    }

    // Accessor untuk jurusan badge color
    public function getJurusanColorAttribute()
    {
        return match ($this->jurusan) {
            'Teknik Informatika' => 'blue',
            'Teknik Sipil' => 'green',
            'Teknik Elektro' => 'yellow',
            'Teknik Mesin' => 'red',
            'Arsitektur' => 'purple',
            'Teknik Bangunan' => 'indigo',
            'Semua Jurusan' => 'gray',
            default => 'gray',
        };
    }

    // Accessor untuk tanggal MOU yang aman
    public function getTanggalMouFormattedAttribute()
    {
        if (!$this->tanggal_mou) {
            return null;
        }
        try {
            return \Illuminate\Support\Carbon::parse((string) $this->tanggal_mou)->format('d/m/Y');
        } catch (\Exception $e) {
            return (string) $this->tanggal_mou;
        }
    }

    // Accessor untuk tanggal berakhir yang aman
    public function getTanggalBerakhirFormattedAttribute()
    {
        if (!$this->tanggal_berakhir) {
            return null;
        }
        try {
            return \Illuminate\Support\Carbon::parse((string) $this->tanggal_berakhir)->format('d/m/Y');
        } catch (\Exception $e) {
            return (string) $this->tanggal_berakhir;
        }
    }
}
