<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->paginate(10);
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'kategori'     => 'required|string',
            'deskripsi'    => 'required|string',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'tanggal_foto' => 'nullable|date_format:Y-m-d|before:2100-01-01|after:1900-01-01',
            'lokasi'       => 'nullable|string|max:255',
            'geosite'      => 'nullable|string|max:100',
        ]);

        $lokasi = $request->lokasi;
        if (empty($lokasi) && $request->geosite) {
            $lokasi = ucwords(str_replace('_', ' ', $request->geosite));
        }

        $data = [
            'judul'        => $request->judul,
            'kategori'     => $request->kategori,
            'deskripsi'    => $request->deskripsi,
            'lokasi'       => $lokasi,
            'tanggal_foto' => $request->tanggal_foto,
            'geosite'      => $request->geosite,
            'status'       => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Data berhasil ditambah!');
    }

    public function show($id)
    {
        return redirect()->route('admin.galeri.edit', $id);
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'kategori'     => 'required|string',
            'deskripsi'    => 'required|string',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'tanggal_foto' => 'nullable|date_format:Y-m-d|before:2100-01-01|after:1900-01-01',
            'lokasi'       => 'nullable|string|max:255',
            'geosite'      => 'nullable|string|max:100',
        ]);

        $galeri = Galeri::findOrFail($id);

        $lokasi = $request->lokasi;
        if (empty($lokasi) && $request->geosite) {
            $lokasi = ucwords(str_replace('_', ' ', $request->geosite));
        }

        $data = [
            'judul'        => $request->judul,
            'kategori'     => $request->kategori,
            'deskripsi'    => $request->deskripsi,
            'lokasi'       => $lokasi,
            'tanggal_foto' => $request->tanggal_foto,
            'geosite'      => $request->geosite,
            'status'       => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($galeri->gambar) {
                Storage::disk('public')->delete($galeri->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($galeri->gambar) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Data dihapus!');
    }
}