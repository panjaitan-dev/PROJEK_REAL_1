<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'gambar',
        'lokasi',
        'tanggal_foto',
        'status',
        'admin_id',
        'galeri_geosite_id',  // penghubung ke tabel galeri_geosite
    ];

    /**
     * Kembalikan URL gambar yang siap dipakai di view.
     * Gambar bisa berupa:
     *  - path storage (galeri/xxx.jpg atau galeri-geosite/xxx.jpg)
     *  - data:image base64 (legacy)
     *  - null
     */
    public function getGambarUrlAttribute(): string
    {
        if (!$this->gambar) {
            return 'https://via.placeholder.com/400x600?text=No+Image';
        }
        if (str_starts_with($this->gambar, 'data:')) {
            return $this->gambar;
        }
        if (str_starts_with($this->gambar, 'http://') || str_starts_with($this->gambar, 'https://')) {
            return $this->gambar;
        }
        // Path relatif storage
        return asset('storage/' . $this->gambar);
    }

    public function admin()
    {
        return $this->belongsTo(\App\Models\Admin::class);
    }

    public function galeriGeosite()
    {
        return $this->belongsTo(GaleriGeosite::class, 'galeri_geosite_id');
    }
}