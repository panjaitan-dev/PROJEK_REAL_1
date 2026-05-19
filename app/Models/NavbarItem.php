<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavbarItem extends Model
{
    protected $table = 'navbar_items';

    protected $fillable = [
        'geosite',
        'label',
        'href',
        'urutan',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'urutan' => 'integer',
    ];
}
