<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'link',
        'urutan',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    // Method untuk mengecek apakah sudah mencapai batas maksimal slider
    public static function canAddMore()
    {
        return self::count() < 3;
    }

    // Method untuk mendapatkan jumlah slider aktif
    public static function getActiveCount()
    {
        return self::where('is_active', true)->count();
    }

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->gambar);
    }

    // Method untuk Filament ImageColumn
    public function getImageUrlForFilamentAttribute()
    {
        if (!$this->gambar) {
            return null;
        }
        
        $path = storage_path('app/public/' . $this->gambar);
        if (file_exists($path)) {
            return asset('storage/' . $this->gambar);
        }
        
        return null;
    }

    // Method untuk base64 image (alternatif)
    public function getImageBase64Attribute()
    {
        if (!$this->gambar) {
            return null;
        }
        
        $path = storage_path('app/public/' . $this->gambar);
        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            return 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
        
        return null;
    }

    // Method untuk menghapus gambar saat model dihapus
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($slider) {
            if ($slider->gambar && Storage::disk('public')->exists($slider->gambar)) {
                Storage::disk('public')->delete($slider->gambar);
            }
        });
    }
}
