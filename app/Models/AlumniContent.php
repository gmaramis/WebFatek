<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'key',
        'value',
        'type',
        'image_url',
        'urutan',
        'is_active',
        'catatan'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    // Scope untuk konten yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk konten berdasarkan section
    public function scopeBySection($query, $section)
    {
        return $query->where('section', $section);
    }

    // Scope untuk mengurutkan berdasarkan urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('created_at', 'asc');
    }

    // Method untuk mendapatkan konten berdasarkan section dan key
    public static function getContent($section, $key, $default = null)
    {
        $content = static::active()
            ->where('section', $section)
            ->where('key', $key)
            ->first();
        
        return $content ? $content->value : $default;
    }

    // Method untuk mendapatkan semua konten dalam section
    public static function getSectionContent($section)
    {
        return static::active()
            ->where('section', $section)
            ->ordered()
            ->get()
            ->keyBy('key');
    }

    // Method untuk mendapatkan statistik
    public static function getStatistik()
    {
        return [
            'total_alumni' => static::getContent('statistik', 'total_alumni', '5000+'),
            'tingkat_penyerapan' => static::getContent('statistik', 'tingkat_penyerapan', '85%'),
            'perusahaan_mitra' => static::getContent('statistik', 'perusahaan_mitra', '150+'),
            'tahun_pengalaman' => static::getContent('statistik', 'tahun_pengalaman', '25'),
        ];
    }

    // Method untuk mendapatkan testimonial
    public static function getTestimonial()
    {
        return static::active()
            ->where('section', 'testimonial')
            ->ordered()
            ->get();
    }

    // Method untuk mendapatkan galeri kegiatan
    public static function getGaleriKegiatan()
    {
        return static::active()
            ->where('section', 'galeri_kegiatan')
            ->ordered()
            ->get();
    }

    // Method untuk mendapatkan jaringan alumni
    public static function getJaringanAlumni()
    {
        return static::active()
            ->where('section', 'jaringan_alumni')
            ->ordered()
            ->get();
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

    // Accessor untuk section label
    public function getSectionLabelAttribute()
    {
        return match($this->section) {
            'hero' => 'Hero Section',
            'statistik' => 'Statistik',
            'testimonial' => 'Testimonial',
            'galeri_kegiatan' => 'Galeri Kegiatan',
            'jaringan_alumni' => 'Jaringan Alumni',
            'kontribusi' => 'Kontribusi Alumni',
            default => ucwords(str_replace('_', ' ', $this->section))
        };
    }

    // Accessor untuk type label
    public function getTypeLabelAttribute()
    {
        return match($this->type) {
            'text' => 'Teks',
            'number' => 'Angka',
            'image' => 'Gambar',
            'html' => 'HTML',
            'url' => 'URL',
            default => ucwords($this->type)
        };
    }
}
