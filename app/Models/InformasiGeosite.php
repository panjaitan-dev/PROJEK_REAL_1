<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiGeosite extends Model
{
    protected $table = 'informasi_geosite';

    protected $fillable = [
        'geosite',
        'judul',
        'konten',
        'gambar',
        'urutan',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'urutan' => 'integer',
    ];

    /**
     * Kembalikan URL gambar yang siap dipakai di view.
     */
    public function getGambarUrlAttribute(): string
    {
        if (!$this->gambar) {
            return 'https://via.placeholder.com/400x300?text=No+Image';
        }
        if (str_starts_with($this->gambar, 'data:')) {
            return $this->gambar;
        }
        if (str_starts_with($this->gambar, 'http://') || str_starts_with($this->gambar, 'https://')) {
            return $this->gambar;
        }
        return asset('storage/' . $this->gambar);
    }

    /**
     * Nama geosite yang readable.
     */
    public static function geositeList(): array
    {
        return [
            'batu_hoda_beach'   => 'Batu Hoda Beach',
            'museum_huta_bolon' => 'Museum Huta Bolon',
            'batu_pasa_pantai'  => 'Batu Pasa Pantai',
        ];
    }

    /**
     * Nama geosite yang readable.
     */
    public function getGeositeNameAttribute(): string
    {
        return self::geositeList()[$this->geosite] ?? $this->geosite;
    }
}
