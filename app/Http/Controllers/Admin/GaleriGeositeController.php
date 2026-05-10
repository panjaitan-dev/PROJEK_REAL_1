<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriGeosite;
use Illuminate\Http\Request;

class GaleriGeositeController extends Controller
{
    private array $geositeList = ['ambarita', 'tuktuk', 'tomok'];

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
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144', // Max 6MB
            'geosite'  => 'required|in:ambarita,tuktuk,tomok',
            'status'   => 'nullable|boolean',
        ]);

        $data = [
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
            'geosite'  => $request->geosite,
            'status'   => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->imageToBase64($request->file('gambar'));
        }

        GaleriGeosite::create($data);

        return redirect()->route('admin.galeri-geosite.index')
            ->with('success', 'Galeri Geosite berhasil ditambahkan!');
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
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144', // Max 6MB
            'geosite'  => 'required|in:ambarita,tuktuk,tomok',
            'status'   => 'nullable|boolean',
        ]);

        $data = [
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
            'geosite'  => $request->geosite,
            'status'   => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->imageToBase64($request->file('gambar'));
        }

        $galeriGeosite->update($data);

        return redirect()->route('admin.galeri-geosite.index')
            ->with('success', 'Galeri Geosite berhasil diupdate!');
    }

    public function destroy($id)
    {
        $galeriGeosite = GaleriGeosite::findOrFail($id);
        $galeriGeosite->delete();

        return redirect()->route('admin.galeri-geosite.index')
            ->with('success', 'Galeri Geosite berhasil dihapus!');
    }

    private function imageToBase64($file): string
    {
        $imageData = file_get_contents($file->getRealPath());
        $base64    = base64_encode($imageData);
        $mimeType  = $file->getMimeType();
        return 'data:' . $mimeType . ';base64,' . $base64;
    }
}
