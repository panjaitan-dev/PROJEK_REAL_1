<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenginapanController extends Controller
{
    private array $geositeList = ['museum_huta_bolon', 'batu_hoda_beach', 'batu_pasa_pantai'];

    public function index()
    {
        $penginapan = Penginapan::orderBy('geosite')->orderBy('nama')->paginate(10);
        return view('admin.penginapan.index', compact('penginapan'));
    }

    public function create()
    {
        $geositeList = $this->geositeList;
        return view('admin.penginapan.create', compact('geositeList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144', // Max 6MB
            'harga'     => 'nullable|string|max:100',
            'kontak'    => 'nullable|string|max:255',
            'geosite'   => 'required|in:museum_huta_bolon,batu_hoda_beach,batu_pasa_pantai',
            'status'    => 'nullable|boolean',
        ]);

        $data = [
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'kontak'    => $request->kontak,
            'geosite'   => $request->geosite,
            'status'    => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('penginapan', 'public');
        }

        Penginapan::create($data);

        return redirect()->route('admin.penginapan.index')
            ->with('success', 'Penginapan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penginapan = Penginapan::findOrFail($id);
        $geositeList = $this->geositeList;
        return view('admin.penginapan.edit', compact('penginapan', 'geositeList'));
    }

    public function update(Request $request, $id)
    {
        $penginapan = Penginapan::findOrFail($id);

        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144', // Max 6MB
            'harga'     => 'nullable|string|max:100',
            'kontak'    => 'nullable|string|max:255',
            'geosite'   => 'required|in:museum_huta_bolon,batu_hoda_beach,batu_pasa_pantai',
            'status'    => 'nullable|boolean',
        ]);

        $data = [
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga'     => $request->harga,
            'kontak'    => $request->kontak,
            'geosite'   => $request->geosite,
            'status'    => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($penginapan->gambar) {
                Storage::disk('public')->delete($penginapan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('penginapan', 'public');
        }

        $penginapan->update($data);

        return redirect()->route('admin.penginapan.index')
            ->with('success', 'Penginapan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $penginapan = Penginapan::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($penginapan->gambar) {
            Storage::disk('public')->delete($penginapan->gambar);
        }

        $penginapan->delete();

        return redirect()->route('admin.penginapan.index')
            ->with('success', 'Penginapan berhasil dihapus!');
    }
}
