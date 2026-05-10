<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
class Destinasi extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda (opsional, jika tabelmu bernama 'destinasis')
    protected $table = 'destinasis'; 

    protected $fillable = [
        'nama',
        'slug',
        'lokasi',
        'deskripsi',
        'gambar_utama',
        'tags',
        'kategori',
        'status',
        'admin_id'  
    ];

    // Agar tags otomatis jadi array saat dipanggil di view
    protected $casts = [
        'tags'   => 'array',
        'status' => 'boolean',
    ];
     public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}