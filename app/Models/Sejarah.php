<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sejarah extends Model
{
    protected $table = 'sejarah';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'urutan',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'urutan' => 'integer',
    ];

    protected $appends = [
        'gambar_url',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = \Illuminate\Support\Str::slug($model->judul);
        });

        static::updating(function ($model) {
            $model->slug = \Illuminate\Support\Str::slug($model->judul);
        });
    }

    public function getGambarUrlAttribute(): string
    {
        if (!$this->gambar) {
            return 'https://via.placeholder.com/400x300?text=No+Image';
        }

        if (str_starts_with($this->gambar, 'data:')) {
            return $this->gambar;
        }

        if (str_starts_with($this->gambar, 'http://') || str_starts_with($this->gambar, 'https://')) {
            return $this->gambar;
        }

        $path = $this->gambar;
        if (str_starts_with($path, '/')) {
            return asset(ltrim($path, '/'));
        }

        if (file_exists(public_path('image/sejarah/' . $path))) {
            return asset('image/sejarah/' . $path);
        }

        if (str_starts_with($path, 'image/sejarah/') || str_starts_with($path, 'image/')) {
            return asset($path);
        }

        return asset('storage/' . $path);
    }
}
