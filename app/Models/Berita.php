<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Admin;
class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'penulis',
        'views',
        'status',
        'admin_id',
    ];

    protected $casts = [
        'status' => 'boolean',
        'views' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
        });
        
        static::updating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
        });
    }
     public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Accessor: Mengembalikan URL gambar yang benar.
     * Menangani dua kasus:
     * 1. Gambar lama yang disimpan sebagai URL eksternal (http/https)
     * 2. Gambar baru yang disimpan sebagai path lokal di storage (berita/xxx.jpg)
     */
    public function getGambarUrlAttribute(): string
    {
        if (!$this->gambar) {
            return asset('image/default.jpg');
        }

        // Jika gambar sudah berupa URL lengkap (http/https), kembalikan langsung
        if (str_starts_with($this->gambar, 'http://') || str_starts_with($this->gambar, 'https://')) {
            return $this->gambar;
        }

        // Jika path lokal, gunakan storage helper
        return asset('storage/' . $this->gambar);
    }
}