<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Destinasi extends Model
{
    use HasFactory;

    protected $table = 'destinasis';

    protected $fillable = [
        'nama',
        'slug',
        'lokasi',
        'deskripsi',
        'gambar_utama',
        'tags',
        'kategori',
        'jam_buka',
        'harga_tiket',
        'fasilitas',
        'umkm_terdekat',
        'informasi_tambahan',
        'maps',
        'status',
        'admin_id',
        'tampil_di_home',
        'urutan_home',
    ];

    protected $casts = [
        'tags'           => 'array',
        'fasilitas'      => 'array',
        'umkm_terdekat'  => 'array',
        'status'         => 'boolean',
        'tampil_di_home' => 'boolean',
        'urutan_home'    => 'integer',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Kembalikan URL gambar_utama yang siap dipakai di view.
     */
    public function getGambarUtamaUrlAttribute(): string
    {
        if (!$this->gambar_utama) {
            return 'https://via.placeholder.com/800x500?text=No+Image';
        }
        if (str_starts_with($this->gambar_utama, 'data:')) {
            return $this->gambar_utama;
        }
        if (str_starts_with($this->gambar_utama, 'http://') || str_starts_with($this->gambar_utama, 'https://')) {
            return $this->gambar_utama;
        }
        return asset('storage/' . $this->gambar_utama);
    }

    /**
     * Dapatkan URL detail destinasi (mengarahkan ke geosite spesifik jika ada).
     */
    public function getDetailUrlAttribute(): string
    {
        $slugLower = strtolower($this->slug);
        if (str_contains($slugLower, 'batu-hoda') || str_contains($slugLower, 'batu_hoda')) {
            return route('geosite.batu_hoda_beach');
        }
        if (str_contains($slugLower, 'batu-pasa') || str_contains($slugLower, 'batu_pasa') || str_contains($slugLower, 'batu-passa')) {
            return route('geosite.batu_pasa_pantai');
        }
        if (str_contains($slugLower, 'museum-huta-bolon') || str_contains($slugLower, 'museum_huta_bolon') || str_contains($slugLower, 'huta-bolon')) {
            return route('geosite.museum_huta_bolon');
        }
        return route('destinasi.detail', $this->slug);
    }
}