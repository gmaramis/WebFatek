<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyLayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'telepon',
        'kategori_responden',
        'program_studi',
        'unit_kerja',
        'jenis_layanan',
        'layanan_spesifik',
        'tanggal_layanan',
        'kemudahan_akses',
        'kecepatan_pelayanan',
        'keramahan_petugas',
        'kejelasan_informasi',
        'kualitas_hasil',
        'kepuasan_keseluruhan',
        'komentar_positif',
        'komentar_negatif',
        'saran_perbaikan',
        'status'
    ];

    protected $casts = [
        'tanggal_layanan' => 'date',
        'kemudahan_akses' => 'integer',
        'kecepatan_pelayanan' => 'integer',
        'keramahan_petugas' => 'integer',
        'kejelasan_informasi' => 'integer',
        'kualitas_hasil' => 'integer',
        'kepuasan_keseluruhan' => 'integer',
    ];

    // Scope untuk data yang aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope untuk filter berdasarkan kategori responden
    public function scopeByKategoriResponden($query, $kategori)
    {
        return $query->where('kategori_responden', $kategori);
    }

    // Scope untuk filter berdasarkan jenis layanan
    public function scopeByJenisLayanan($query, $jenis)
    {
        return $query->where('jenis_layanan', $jenis);
    }

    // Accessor untuk kategori responden label
    public function getKategoriRespondenLabelAttribute()
    {
        return match ($this->kategori_responden) {
            'mahasiswa' => 'Mahasiswa',
            'dosen' => 'Dosen',
            'tenaga_kependidikan' => 'Tenaga Kependidikan',
            'alumni' => 'Alumni',
            'pemangku_kepentingan' => 'Pemangku Kepentingan',
            default => 'Tidak Diketahui',
        };
    }

    // Accessor untuk jenis layanan label
    public function getJenisLayananLabelAttribute()
    {
        return match ($this->jenis_layanan) {
            'akademik' => 'Akademik',
            'kemahasiswaan' => 'Kemahasiswaan',
            'keuangan' => 'Keuangan',
            'sarana_prasarana' => 'Sarana & Prasarana',
            'teknologi_informasi' => 'Teknologi Informasi',
            'kerjasama' => 'Kerjasama',
            'umum' => 'Layanan Umum',
            'lainnya' => 'Lainnya',
            default => 'Tidak Diketahui',
        };
    }

    // Accessor untuk rata-rata penilaian
    public function getRataRataPenilaianAttribute()
    {
        $total = $this->kemudahan_akses + $this->kecepatan_pelayanan + $this->keramahan_petugas + 
                 $this->kejelasan_informasi + $this->kualitas_hasil + $this->kepuasan_keseluruhan;
        return round($total / 6, 1);
    }

    // Accessor untuk status penilaian
    public function getStatusPenilaianAttribute()
    {
        $rataRata = $this->rata_rata_penilaian;
        return match (true) {
            $rataRata >= 4.5 => 'Sangat Puas',
            $rataRata >= 3.5 => 'Puas',
            $rataRata >= 2.5 => 'Cukup Puas',
            $rataRata >= 1.5 => 'Kurang Puas',
            default => 'Tidak Puas',
        };
    }

    // Accessor untuk warna status penilaian
    public function getWarnaStatusPenilaianAttribute()
    {
        $rataRata = $this->rata_rata_penilaian;
        return match (true) {
            $rataRata >= 4.5 => 'success',
            $rataRata >= 3.5 => 'success',
            $rataRata >= 2.5 => 'warning',
            $rataRata >= 1.5 => 'danger',
            default => 'danger',
        };
    }
}
