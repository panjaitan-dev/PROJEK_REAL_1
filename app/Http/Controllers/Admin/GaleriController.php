<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

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
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144', // Max 6MB
        ]);

        $data = [
            'judul'        => $request->judul,
            'kategori'     => $request->kategori,
            'deskripsi'    => $request->deskripsi,
            'lokasi'       => $request->lokasi,
            'tanggal_foto' => $request->tanggal_foto,
            'status'       => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $image    = $request->file('gambar');
            $imageData = file_get_contents($image->getRealPath());
            $base64   = base64_encode($imageData);
            $mimeType = $image->getMimeType();
            $data['gambar'] = 'data:' . $mimeType . ';base64,' . $base64;
        }

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144', // Max 6MB
        ]);

        $galeri = Galeri::findOrFail($id);

        $data = [
            'judul'        => $request->judul,
            'kategori'     => $request->kategori,
            'deskripsi'    => $request->deskripsi,
            'lokasi'       => $request->lokasi,
            'tanggal_foto' => $request->tanggal_foto,
            'status'       => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $image    = $request->file('gambar');
            $imageData = file_get_contents($image->getRealPath());
            $base64   = base64_encode($imageData);
            $mimeType = $image->getMimeType();
            $data['gambar'] = 'data:' . $mimeType . ';base64,' . $base64;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Data dihapus!');
    }
}