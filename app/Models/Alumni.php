<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'program_studi',
        'tahun_lulus',
        'email',
        'nomor_telepon',
        'alamat',
        'pekerjaan',
        'perusahaan',
        'jabatan',
        'bidang_industri',
        'gaji',
        'status_kerja',
        'prestasi',
        'kontribusi',
        'foto',
        'is_active',
        'newsletter',
        'catatan'
    ];

    protected $casts = [
        'gaji' => 'decimal:2',
        'is_active' => 'boolean',
        'newsletter' => 'boolean',
        'tahun_lulus' => 'integer',
    ];

    // Scope untuk alumni yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk alumni berdasarkan program studi
    public function scopeByProgramStudi($query, $programStudi)
    {
        return $query->where('program_studi', $programStudi);
    }

    // Scope untuk alumni berdasarkan tahun lulus
    public function scopeByTahunLulus($query, $tahun)
    {
        return $query->where('tahun_lulus', $tahun);
    }

    // Accessor untuk nama lengkap dengan gelar
    public function getNamaLengkapAttribute($value)
    {
        return ucwords(strtolower($value));
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

    // Accessor untuk status kerja yang diformat
    public function getStatusKerjaFormattedAttribute()
    {
        return match($this->status_kerja) {
            'bekerja' => 'Bekerja',
            'wirausaha' => 'Wirausaha',
            'belum_bekerja' => 'Belum Bekerja',
            'lanjut_studi' => 'Lanjut Studi',
            default => $this->status_kerja
        };
    }

    // Accessor untuk gaji yang diformat
    public function getGajiFormattedAttribute()
    {
        if (!$this->gaji) {
            return '-';
        }
        return 'Rp ' . number_format($this->gaji, 0, ',', '.');
    }

    // Accessor untuk foto dengan default
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->nama_lengkap) . '&color=ea580c&background=fef3c7';
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
