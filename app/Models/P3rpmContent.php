<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P3rpmContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'title',
        'content',
        'subtitle',
        'description',
        'image',
        'icon',
        'color',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope untuk konten yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk mengurutkan berdasarkan order
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'asc');
    }

    // Scope untuk filter berdasarkan section
    public function scopeBySection($query, $section)
    {
        return $query->where('section', $section);
    }

    // Accessor untuk status label
    public function getStatusLabelAttribute()
    {
        return $this->is_active ? 'Aktif' : 'Nonaktif';
    }

    // Accessor untuk status badge color
    public function getStatusColorAttribute()
    {
        return $this->is_active ? 'success' : 'danger';
    }

    // Accessor untuk section label
    public function getSectionLabelAttribute()
    {
        return match ($this->section) {
            'hero' => 'Hero Section',
            'deskripsi' => 'Deskripsi P3RPM',
            'visi' => 'Visi',
            'misi' => 'Misi',
            'program' => 'Program Unggulan',
            'skema' => 'Skema Pendanaan',
            'roadmap' => 'Roadmap Riset',
            'kontak' => 'Informasi Kontak',
            default => ucfirst($this->section),
        };
    }

    // Accessor untuk section badge color
    public function getSectionColorAttribute()
    {
        return match ($this->section) {
            'hero' => 'primary',
            'deskripsi' => 'info',
            'visi' => 'success',
            'misi' => 'warning',
            'program' => 'purple',
            'skema' => 'blue',
            'roadmap' => 'green',
            'kontak' => 'secondary',
            default => 'gray',
        };
    }
}
