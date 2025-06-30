<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DokumenDownload extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'file_path',
        'file_name',
        'file_size',
        'file_type',
        'download_count',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'download_count' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->file_path && !$model->file_size) {
                $model->file_size = Storage::disk('public')->size($model->file_path);
            }
            if ($model->file_path && !$model->file_type) {
                $model->file_type = strtoupper(pathinfo($model->file_path, PATHINFO_EXTENSION));
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('file_path') && $model->file_path) {
                $model->file_size = Storage::disk('public')->size($model->file_path);
                $model->file_type = strtoupper(pathinfo($model->file_path, PATHINFO_EXTENSION));
            }
        });
    }

    public function setFileTypeAttribute($value)
    {
        $this->attributes['file_type'] = strtoupper($value);
    }

    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }

    public function getFormattedFileSizeAttribute()
    {
        if (!$this->file_size) return 'Unknown';
        
        $bytes = (int) $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function incrementDownloadCount()
    {
        $this->increment('download_count');
    }
}
