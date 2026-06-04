<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailGeosite extends Model
{
    protected $table = 'detail_geosites';

    protected $fillable = [
        'geosite',
        'maps_url',
        'jam_buka',
        'harga_tiket',
    ];
}
