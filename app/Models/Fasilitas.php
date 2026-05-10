<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';

    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'harga',
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
