<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Penginapan;
use App\Models\Fasilitas;
use App\Models\GaleriGeosite;

class GeositeController extends Controller
{
    public function tuktuk()
    {
        $umkm = Umkm::where('geosite', 'tuktuk')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'tuktuk')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'tuktuk')->where('status', true)->get();
        $galeriGeosite = GaleriGeosite::where('geosite', 'tuktuk')->where('status', true)->get();
        $kategoriGaleri = $galeriGeosite->pluck('kategori')->unique()->values();

        return view('geosite.Tuk-tuk', compact('umkm', 'penginapan', 'fasilitas', 'galeriGeosite', 'kategoriGaleri'));
    }
    
    public function Ambarita()
    {
        $umkm = Umkm::where('geosite', 'ambarita')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'ambarita')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'ambarita')->where('status', true)->get();
        $galeriGeosite = GaleriGeosite::where('geosite', 'ambarita')->where('status', true)->get();
        $kategoriGaleri = $galeriGeosite->pluck('kategori')->unique()->values();

        return view('geosite.Ambarita', compact('umkm', 'penginapan', 'fasilitas', 'galeriGeosite', 'kategoriGaleri'));
    }
    
    public function Tomok()
    {
        $umkm = Umkm::where('geosite', 'tomok')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'tomok')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'tomok')->where('status', true)->get();
        $galeriGeosite = GaleriGeosite::where('geosite', 'tomok')->where('status', true)->get();
        $kategoriGaleri = $galeriGeosite->pluck('kategori')->unique()->values();

        return view('geosite.Tomok', compact('umkm', 'penginapan', 'fasilitas', 'galeriGeosite', 'kategoriGaleri'));
    }
}