<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\GaleriGeosite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriGeositeController extends Controller
{
    private array $geositeList = ['museum_huta_bolon', 'batu_hoda_beach', 'batu_pasa_pantai'];

    public function index()
    {
        $galeriGeosite = GaleriGeosite::orderBy('geosite')->orderBy('kategori')->paginate(10);
        return view('admin.galeri-geosite.index', compact('galeriGeosite'));
    }

    public function create()
    {
        $geositeList = $this->geositeList;
        return view('admin.galeri-geosite.create', compact('geositeList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'geosite'  => 'required|in:museum_huta_bolon,batu_hoda_beach,batu_pasa_pantai',
            'deskripsi'=> 'nullable|string',
            'status'   => 'nullable|boolean',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('galeri-geosite', 'public');
        }

        // 1. Simpan ke galeri_geosite
        $geosite = GaleriGeosite::create([
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
            'geosite'  => $request->geosite,
            'gambar'   => $gambarPath,
            'status'   => $request->has('status') ? 1 : 0,
        ]);

        // 2. Otomatis sync ke tabel galeri (halaman publik)
        Galeri::create([
            'judul'             => $request->judul,
            'kategori'          => $request->kategori,
            'deskripsi'         => $request->deskripsi ?? 'Foto dari ' . str_replace('_', ' ', $request->geosite),
            'gambar'            => $gambarPath ? 'galeri-geosite/' . basename($gambarPath) : null,
            'lokasi'            => str_replace('_', ' ', $request->geosite),
            'status'            => $request->has('status') ? 1 : 0,
            'galeri_geosite_id' => $geosite->id,
        ]);

        return redirect()->route('admin.galeri-geosite.index')
            ->with('success', 'Galeri Geosite berhasil ditambahkan dan otomatis tampil di Halaman Galeri!');
    }

    public function edit($id)
    {
        $galeriGeosite = GaleriGeosite::findOrFail($id);
        $geositeList   = $this->geositeList;
        return view('admin.galeri-geosite.edit', compact('galeriGeosite', 'geositeList'));
    }

    public function update(Request $request, $id)
    {
        $galeriGeosite = GaleriGeosite::findOrFail($id);

        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'geosite'  => 'required|in:museum_huta_bolon,batu_hoda_beach,batu_pasa_pantai',
            'deskripsi'=> 'nullable|string',
            'status'   => 'nullable|boolean',
        ]);

        $gambarPath = $galeriGeosite->gambar; // keep existing

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage
            if ($galeriGeosite->gambar) {
                Storage::disk('public')->delete($galeriGeosite->gambar);
            }
            $gambarPath = $request->file('gambar')->store('galeri-geosite', 'public');
        }

        // 1. Update galeri_geosite
        $galeriGeosite->update([
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
            'geosite'  => $request->geosite,
            'gambar'   => $gambarPath,
            'status'   => $request->has('status') ? 1 : 0,
        ]);

        // 2. Sync update ke tabel galeri
        $galeriEntry = Galeri::where('galeri_geosite_id', $galeriGeosite->id)->first();
        if ($galeriEntry) {
            $galeriEntry->update([
                'judul'    => $request->judul,
                'kategori' => $request->kategori,
                'deskripsi'=> $request->deskripsi ?? $galeriEntry->deskripsi,
                'gambar'   => $gambarPath ? 'galeri-geosite/' . basename($gambarPath) : $galeriEntry->gambar,
                'lokasi'   => str_replace('_', ' ', $request->geosite),
                'status'   => $request->has('status') ? 1 : 0,
            ]);
        } else {
            // Jika belum ada entri galeri (data lama), buat baru
            Galeri::create([
                'judul'             => $request->judul,
                'kategori'          => $request->kategori,
                'deskripsi'         => $request->deskripsi ?? 'Foto dari ' . str_replace('_', ' ', $request->geosite),
                'gambar'            => $gambarPath ? 'galeri-geosite/' . basename($gambarPath) : null,
                'lokasi'            => str_replace('_', ' ', $request->geosite),
                'status'            => $request->has('status') ? 1 : 0,
                'galeri_geosite_id' => $galeriGeosite->id,
            ]);
        }

        return redirect()->route('admin.galeri-geosite.index')
            ->with('success', 'Galeri Geosite berhasil diupdate dan tersinkron ke Halaman Galeri!');
    }

    public function destroy($id)
    {
        $galeriGeosite = GaleriGeosite::findOrFail($id);

        // Hapus dari storage
        if ($galeriGeosite->gambar) {
            Storage::disk('public')->delete($galeriGeosite->gambar);
        }

        // Hapus entri galeri yang terhubung
        Galeri::where('galeri_geosite_id', $galeriGeosite->id)->delete();

        $galeriGeosite->delete();

        return redirect()->route('admin.galeri-geosite.index')
            ->with('success', 'Galeri Geosite berhasil dihapus dari semua halaman!');
    }
}
