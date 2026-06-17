<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Penginapan;
use App\Models\Fasilitas;
use App\Models\Galeri;
use App\Models\NavbarItem;
use App\Models\DetailGeosite;
use App\Models\InformasiGeosite;

class GeositeController extends Controller
{
    public function batu_hoda_beach()
    {
        $umkm = Umkm::where('geosite', 'batu_hoda_beach')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'batu_hoda_beach')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'batu_hoda_beach')->where('status', true)->get();
        $galeriGeosite = Galeri::where('geosite', 'batu_hoda_beach')->where('status', true)->get();
        $navbarItems = NavbarItem::where('geosite', 'batu_hoda_beach')
            ->where('status', true)
            ->orderBy('urutan')
            ->get();
        $kategoriGaleri = $galeriGeosite->pluck('kategori')->unique()->values();
        $detailGeosite = DetailGeosite::where('geosite', 'batu_hoda_beach')->first();
        $informasiGeosite = InformasiGeosite::where('geosite', 'batu_hoda_beach')
            ->where('status', true)
            ->orderBy('urutan')
            ->get();

        return view('geosite.batu_hoda_beach', compact('umkm', 'penginapan', 'fasilitas', 'galeriGeosite', 'kategoriGaleri', 'navbarItems', 'detailGeosite', 'informasiGeosite'));
    }
    
    public function museum_huta_bolon()
    {
        $umkm = Umkm::where('geosite', 'museum_huta_bolon')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'museum_huta_bolon')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'museum_huta_bolon')->where('status', true)->get();
        $galeriGeosite = Galeri::where('geosite', 'museum_huta_bolon')->where('status', true)->get();
        $kategoriGaleri = $galeriGeosite->pluck('kategori')->unique()->values();
        $detailGeosite = DetailGeosite::where('geosite', 'museum_huta_bolon')->first();
        $informasiGeosite = InformasiGeosite::where('geosite', 'museum_huta_bolon')
            ->where('status', true)
            ->orderBy('urutan')
            ->get();

        return view('geosite.museum_huta_bolon', compact('umkm', 'penginapan', 'fasilitas', 'galeriGeosite', 'kategoriGaleri', 'detailGeosite', 'informasiGeosite'));
    }
    
    public function batu_pasa_pantai()
    {
        $umkm = Umkm::where('geosite', 'batu_pasa_pantai')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'batu_pasa_pantai')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'batu_pasa_pantai')->where('status', true)->get();
        $galeriGeosite = Galeri::where('geosite', 'batu_pasa_pantai')->where('status', true)->get();
        $kategoriGaleri = $galeriGeosite->pluck('kategori')->unique()->values();
        $detailGeosite = DetailGeosite::where('geosite', 'batu_pasa_pantai')->first();
        $informasiGeosite = InformasiGeosite::where('geosite', 'batu_pasa_pantai')
            ->where('status', true)
            ->orderBy('urutan')
            ->get();

        return view('geosite.batu_pasa_pantai', compact('umkm', 'penginapan', 'fasilitas', 'galeriGeosite', 'kategoriGaleri', 'detailGeosite', 'informasiGeosite'));
    }
}