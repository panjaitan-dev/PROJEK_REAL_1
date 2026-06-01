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

    /**
     * Kembalikan URL gambar yang siap dipakai di view.
     */
    public function getGambarUrlAttribute(): string
    {
        if (!$this->gambar) {
            return 'https://via.placeholder.com/400x600?text=No+Image';
        }
        if (str_starts_with($this->gambar, 'data:')) {
            return $this->gambar;
        }
        if (str_starts_with($this->gambar, 'http://') || str_starts_with($this->gambar, 'https://')) {
            return $this->gambar;
        }
        // Path relatif storage
        return asset('storage/' . $this->gambar);
    }
}
