<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Informasi extends Model
{
    protected $table = 'informasi';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'urutan',
        'status',
        'admin_id'  
    ];

    protected $casts = [
        'status' => 'boolean',
        'urutan' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($informasi) {
            $informasi->slug = \Illuminate\Support\Str::slug($informasi->judul);
        });
        
        static::updating(function ($informasi) {
            $informasi->slug = \Illuminate\Support\Str::slug($informasi->judul);
        });
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Kembalikan URL gambar yang siap dipakai di view.
     */
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
        return asset('storage/' . $this->gambar);
    }
}