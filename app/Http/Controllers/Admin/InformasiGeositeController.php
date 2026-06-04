<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiGeosite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiGeositeController extends Controller
{
    public function index(Request $request)
    {
        $geositeList = InformasiGeosite::geositeList();
        $filterGeosite = $request->get('geosite', null);

        $query = InformasiGeosite::orderBy('geosite')->orderBy('urutan', 'asc');

        if ($filterGeosite && array_key_exists($filterGeosite, $geositeList)) {
            $query->where('geosite', $filterGeosite);
        }

        $informasi = $query->paginate(15);

        return view('admin.informasi-geosite.index', compact('informasi', 'geositeList', 'filterGeosite'));
    }

    public function create()
    {
        $geositeList = InformasiGeosite::geositeList();
        return view('admin.informasi-geosite.create', compact('geositeList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'geosite' => 'required|string|in:batu_hoda_beach,museum_huta_bolon,batu_pasa_pantai',
            'judul'   => 'required|string|max:255',
            'konten'  => 'required|string',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'urutan'  => 'required|integer|min:1',
            'status'  => 'nullable|boolean',
        ]);

        $data = [
            'geosite' => $request->geosite,
            'judul'   => $request->judul,
            'konten'  => $request->konten,
            'urutan'  => $request->urutan,
            'status'  => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('informasi-geosite', 'public');
        }

        InformasiGeosite::create($data);

        return redirect()->route('admin.informasi-geosite.index')
            ->with('success', 'Informasi geosite berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $informasi = InformasiGeosite::findOrFail($id);
        $geositeList = InformasiGeosite::geositeList();
        return view('admin.informasi-geosite.edit', compact('informasi', 'geositeList'));
    }

    public function update(Request $request, $id)
    {
        $informasi = InformasiGeosite::findOrFail($id);

        $request->validate([
            'geosite' => 'required|string|in:batu_hoda_beach,museum_huta_bolon,batu_pasa_pantai',
            'judul'   => 'required|string|max:255',
            'konten'  => 'required|string',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'urutan'  => 'required|integer|min:1',
            'status'  => 'nullable|boolean',
        ]);

        $data = [
            'geosite' => $request->geosite,
            'judul'   => $request->judul,
            'konten'  => $request->konten,
            'urutan'  => $request->urutan,
            'status'  => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($informasi->gambar) {
                Storage::disk('public')->delete($informasi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('informasi-geosite', 'public');
        }

        $informasi->update($data);

        return redirect()->route('admin.informasi-geosite.index')
            ->with('success', 'Informasi geosite berhasil diupdate!');
    }

    public function destroy($id)
    {
        $informasi = InformasiGeosite::findOrFail($id);

        if ($informasi->gambar) {
            Storage::disk('public')->delete($informasi->gambar);
        }

        $informasi->delete();

        return redirect()->route('admin.informasi-geosite.index')
            ->with('success', 'Informasi geosite berhasil dihapus!');
    }
}
