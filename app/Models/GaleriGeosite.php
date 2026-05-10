<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
class GaleriGeosite extends Model
{
    use HasFactory;

    protected $table = 'galeri_geosite';

    protected $fillable = [
        'judul',
        'kategori',
        'gambar',
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
