<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';

    protected $fillable = [
        'tipe',
        'judul',
        'nilai',
        'nilai_tambahan',
        'icon',
        'tautan',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
