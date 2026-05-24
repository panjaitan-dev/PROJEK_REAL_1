<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Halaman galeri publik.
     * Menampilkan semua gambar aktif dari tabel galeri
     * (termasuk yang di-sync dari galeri_geosite).
     */
    public function index()
    {
        $allGaleri = Galeri::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                // Normalkan src gambar (bisa storage path atau base64)
                if (!$item->gambar) {
                    $src = 'https://via.placeholder.com/400x600?text=No+Image';
                } elseif (str_starts_with($item->gambar, 'data:')) {
                    $src = $item->gambar;
                } else {
                    $src = asset('storage/' . $item->gambar);
                }

                return [
                    'src'              => $src,
                    'judul'            => $item->judul,
                    'deskripsi'        => $item->deskripsi ?? '',
                    'lokasi'           => $item->lokasi ?? 'Danau Toba',
                    'kategori'         => strtoupper($item->kategori),
                    'galeri_geosite_id'=> $item->galeri_geosite_id,
                ];
            });

        // Kelompokkan berdasarkan kategori (untuk phone stack section-label)
        $galeriByKategori = $allGaleri->groupBy('kategori');

        // $allPhotos = array siap pakai di blade
        $allPhotos = $allGaleri->values()->toArray();

        return view('pages.galeri', compact('galeriByKategori', 'allPhotos'));
    }
}