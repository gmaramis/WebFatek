<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAkademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_jadwal',
        'judul',
        'deskripsi',
        'warna',
        'icon',
        'periode',
        'jadwal_detail',
        'status',
        'urutan',
        'catatan'
    ];

    protected $casts = [
        'periode' => 'array',
        'jadwal_detail' => 'array',
    ];

    // Scope untuk jadwal yang aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk mengurutkan berdasarkan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('created_at', 'desc');
    }

    // Accessor untuk status label
    public function getStatusLabelAttribute()
    {
        return $this->status === 'aktif' ? 'Aktif' : 'Nonaktif';
    }

    // Accessor untuk status badge color
    public function getStatusColorAttribute()
    {
        return $this->status === 'aktif' ? 'success' : 'danger';
    }

    // Accessor untuk warna CSS class
    public function getWarnaClassAttribute()
    {
        return match($this->warna) {
            'blue' => 'blue',
            'green' => 'green',
            'yellow' => 'yellow',
            'red' => 'red',
            'orange' => 'orange',
            'purple' => 'purple',
            'teal' => 'teal',
            'indigo' => 'indigo',
            default => 'blue',
        };
    }

    // Accessor untuk format periode
    public function getPeriodeFormattedAttribute()
    {
        if (!$this->periode) return null;
        
        $mulai = $this->periode['mulai'] ?? '';
        $selesai = $this->periode['selesai'] ?? '';
        
        if ($mulai && $selesai) {
            return $mulai . ' - ' . $selesai;
        } elseif ($mulai) {
            return $mulai;
        }
        
        return null;
    }

    // Accessor untuk detail jadwal yang diformat
    public function getJadwalDetailFormattedAttribute()
    {
        if (!$this->jadwal_detail) return [];
        
        $formatted = [];
        foreach ($this->jadwal_detail as $key => $value) {
            $formatted[] = [
                'label' => ucfirst(str_replace('_', ' ', $key)),
                'value' => $value
            ];
        }
        
        return $formatted;
    }

    // Accessor untuk jenis jadwal label
    public function getJenisJadwalLabelAttribute()
    {
        return match($this->jenis_jadwal) {
            'semester_ganjil' => 'Semester Ganjil',
            'semester_genap' => 'Semester Genap',
            'uts' => 'Ujian Tengah Semester',
            'libur_akademik' => 'Libur Akademik',
            'wisuda' => 'Wisuda',
            'pendaftaran' => 'Pendaftaran Mahasiswa Baru',
            'semester_pendek' => 'Semester Pendek',
            default => ucfirst(str_replace('_', ' ', $this->jenis_jadwal)),
        };
    }

    // Scope untuk filter berdasarkan jenis jadwal
    public function scopeByJenis($query, $jenis)
    {
        return $query->where('jenis_jadwal', $jenis);
    }
}
