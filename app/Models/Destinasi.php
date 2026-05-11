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
        'admin_id'
    ];

    protected $casts = [
        'tags' => 'array',
        'fasilitas' => 'array',
        'umkm_terdekat' => 'array',
        'status' => 'boolean',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}