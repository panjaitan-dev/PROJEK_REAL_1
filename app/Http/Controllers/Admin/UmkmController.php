<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    private array $geositeList = ['ambarita', 'tuktuk', 'tomok'];

    public function index()
    {
        $umkm = Umkm::orderBy('geosite')->orderBy('nama')->paginate(10);
        return view('admin.umkm.index', compact('umkm'));
    }

    public function create()
    {
        $geositeList = $this->geositeList;
        return view('admin.umkm.create', compact('geositeList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144', // Max 6MB
            'lokasi'    => 'nullable|string|max:255',
            'kontak'    => 'nullable|string|max:255',
            'geosite'   => 'required|in:ambarita,tuktuk,tomok',
            'status'    => 'nullable|boolean',
        ]);

        $data = [
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi'    => $request->lokasi,
            'kontak'    => $request->kontak,
            'geosite'   => $request->geosite,
            'status'    => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->imageToBase64($request->file('gambar'));
        }

        Umkm::create($data);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        $geositeList = $this->geositeList;
        return view('admin.umkm.edit', compact('umkm', 'geositeList'));
    }

    public function update(Request $request, $id)
    {
        $umkm = Umkm::findOrFail($id);

        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144', // Max 6MB
            'lokasi'    => 'nullable|string|max:255',
            'kontak'    => 'nullable|string|max:255',
            'geosite'   => 'required|in:ambarita,tuktuk,tomok',
            'status'    => 'nullable|boolean',
        ]);

        $data = [
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi'    => $request->lokasi,
            'kontak'    => $request->kontak,
            'geosite'   => $request->geosite,
            'status'    => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->imageToBase64($request->file('gambar'));
        }

        $umkm->update($data);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diupdate!');
    }

    public function destroy($id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->delete();

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus!');
    }

    private function imageToBase64($file): string
    {
        $imageData = file_get_contents($file->getRealPath());
        $base64    = base64_encode($imageData);
        $mimeType  = $file->getMimeType();
        return 'data:' . $mimeType . ';base64,' . $base64;
    }
}
