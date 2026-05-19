<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Penginapan;
use App\Models\Fasilitas;
use App\Models\GaleriGeosite;
use App\Models\NavbarItem;

class GeositeController extends Controller
{
    public function batu_hoda_beach()
    {
        $umkm = Umkm::where('geosite', 'batu_hoda_beach')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'batu_hoda_beach')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'batu_hoda_beach')->where('status', true)->get();
        $galeriGeosite = GaleriGeosite::where('geosite', 'batu_hoda_beach')->where('status', true)->get();
        $navbarItems = NavbarItem::where('geosite', 'batu_hoda_beach')
            ->where('status', true)
            ->orderBy('urutan')
            ->get();
        $kategoriGaleri = $galeriGeosite->pluck('kategori')->unique()->values();

        return view('geosite.batu_hoda_beach', compact('umkm', 'penginapan', 'fasilitas', 'galeriGeosite', 'kategoriGaleri', 'navbarItems'));
    }
    
    public function museum_huta_bolon()
    {
        $umkm = Umkm::where('geosite', 'museum_huta_bolon')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'museum_huta_bolon')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'museum_huta_bolon')->where('status', true)->get();
        $galeriGeosite = GaleriGeosite::where('geosite', 'museum_huta_bolon')->where('status', true)->get();
        $navbarItems = NavbarItem::where('geosite', 'museum_huta_bolon')
            ->where('status', true)
            ->orderBy('urutan')
            ->get();
        $kategoriGaleri = $galeriGeosite->pluck('kategori')->unique()->values();

        return view('geosite.museum_huta_bolon', compact('umkm', 'penginapan', 'fasilitas', 'galeriGeosite', 'kategoriGaleri', 'navbarItems'));
    }
    
    public function batu_pasa_pantai()
    {
        $umkm = Umkm::where('geosite', 'batu_pasa_pantai')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'batu_pasa_pantai')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'batu_pasa_pantai')->where('status', true)->get();
        $galeriGeosite = GaleriGeosite::where('geosite', 'batu_pasa_pantai')->where('status', true)->get();
        $kategoriGaleri = $galeriGeosite->pluck('kategori')->unique()->values();

        return view('geosite.batu_pasa_pantai', compact('umkm', 'penginapan', 'fasilitas', 'galeriGeosite', 'kategoriGaleri'));
    }
}