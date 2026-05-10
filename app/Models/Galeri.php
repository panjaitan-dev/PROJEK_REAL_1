<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $fillable = ['judul', 'kategori', 'deskripsi', 'gambar', 'status', 'admin_id'];
     public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}