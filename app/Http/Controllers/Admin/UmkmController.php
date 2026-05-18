<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    private array $geositeList = ['museum_huta_bolon', 'batu_hoda_beach', 'batu_pasa_pantai'];

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
            'geosite'   => 'required|in:museum_huta_bolon,batu_hoda_beach,batu_pasa_pantai',
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
            $data['gambar'] = $request->file('gambar')->store('umkm', 'public');
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
            'geosite'   => 'required|in:museum_huta_bolon,batu_hoda_beach,batu_pasa_pantai',
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
            // Hapus gambar lama jika ada
            if ($umkm->gambar) {
                Storage::disk('public')->delete($umkm->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('umkm', 'public');
        }

        $umkm->update($data);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diupdate!');
    }

    public function destroy($id)
    {
        $umkm = Umkm::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($umkm->gambar) {
            Storage::disk('public')->delete($umkm->gambar);
        }

        $umkm->delete();

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus!');
    }
}
