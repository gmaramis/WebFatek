<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nim',
        'program_studi',
        'tahun_lulus',
        'email',
        'telepon',
        'status_pekerjaan',
        'waktu_tunggu_kerja',
        'nama_perusahaan',
        'jabatan',
        'gaji',
        'kesesuaian_bidang',
        'kepuasan_kurikulum',
        'relevansi_ilmu',
        'saran_pengembangan',
        'ipk',
        'alamat',
        'jenis_perusahaan',
        'bidang_pekerjaan',
        'sumber_informasi_lowongan',
        'metode_mencari_kerja',
        'lamanya_mencari_kerja',
        'jumlah_lamaran',
        'jumlah_wawancara',
        'alasan_belum_bekerja',
        'rencana_kedepan',
        'kompetensi_yang_dibutuhkan',
        'kompetensi_yang_dimiliki',
        'saran_untuk_almamater',
        'status'
    ];

    protected $casts = [
        'gaji' => 'decimal:2',
        'ipk' => 'decimal:2',
        'waktu_tunggu_kerja' => 'integer',
        'jumlah_lamaran' => 'integer',
        'jumlah_wawancara' => 'integer',
        'lamanya_mencari_kerja' => 'integer',
    ];

    // Scope untuk data yang aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk filter berdasarkan program studi
    public function scopeByProgramStudi($query, $programStudi)
    {
        return $query->where('program_studi', $programStudi);
    }

    // Scope untuk filter berdasarkan tahun lulus
    public function scopeByTahunLulus($query, $tahun)
    {
        return $query->where('tahun_lulus', $tahun);
    }

    // Accessor untuk status pekerjaan label
    public function getStatusPekerjaanLabelAttribute()
    {
        return match ($this->status_pekerjaan) {
            'bekerja' => 'Bekerja',
            'wirausaha' => 'Wirausaha',
            'belum_bekerja' => 'Belum Bekerja',
            'lanjut_studi' => 'Lanjut Studi',
            default => 'Tidak Diketahui',
        };
    }

    // Accessor untuk kesesuaian bidang label
    public function getKesesuaianBidangLabelAttribute()
    {
        return match ($this->kesesuaian_bidang) {
            'sangat_sesuai' => 'Sangat Sesuai',
            'sesuai' => 'Sesuai',
            'kurang_sesuai' => 'Kurang Sesuai',
            'tidak_sesuai' => 'Tidak Sesuai',
            default => 'Tidak Diketahui',
        };
    }

    // Accessor untuk program studi label
    public function getProgramStudiLabelAttribute()
    {
        return match ($this->program_studi) {
            'teknik-informatika' => 'Teknik Informatika',
            'teknik-sipil' => 'Teknik Sipil',
            'teknik-elektro' => 'Teknik Elektro',
            'teknik-mesin' => 'Teknik Mesin',
            'arsitektur' => 'Arsitektur',
            'teknik-bangunan' => 'Teknik Bangunan',
            default => $this->program_studi,
        };
    }

    // Accessor untuk gaji formatted
    public function getGajiFormattedAttribute()
    {
        if (!$this->gaji) {
            return '-';
        }
        return 'Rp ' . number_format((float)$this->gaji, 0, ',', '.') . ' juta';
    }

    // Accessor untuk waktu tunggu formatted
    public function getWaktuTungguFormattedAttribute()
    {
        if (!$this->waktu_tunggu_kerja) {
            return '-';
        }
        return $this->waktu_tunggu_kerja . ' bulan';
    }
} 