<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';

    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'lokasi',
        'kontak',
        'geosite',
        'status',
        'admin_id'  
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
     public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
