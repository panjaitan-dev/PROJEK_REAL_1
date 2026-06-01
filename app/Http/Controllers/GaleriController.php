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
                // Normalkan src gambar (bisa storage path, URL eksternal, atau base64)
                $src = $item->gambar_url;

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