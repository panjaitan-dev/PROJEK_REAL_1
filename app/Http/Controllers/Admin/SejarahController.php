<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.informasi.index', compact('sejarah'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'urutan' => 'required|integer|unique:sejarah,urutan',
            'status' => 'nullable|boolean'
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('sejarah', 'public');
        }

        Sejarah::create($data);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        return view('admin.informasi.edit', compact('sejarah'));
    }

    public function update(Request $request, $id)
    {
        $sejarah = Sejarah::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'urutan' => 'required|integer|unique:sejarah,urutan,' . $id,
            'status' => 'nullable|boolean'
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? 1 : 0
        ];

        if ($request->hasFile('gambar')) {
            if ($sejarah->gambar) {
                Storage::disk('public')->delete($sejarah->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('sejarah', 'public');
        }

        $sejarah->update($data);

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $sejarah = Sejarah::findOrFail($id);

        if ($sejarah->gambar) {
            Storage::disk('public')->delete($sejarah->gambar);
        }

        $sejarah->delete();

        return redirect()->route('admin.informasi.index')
            ->with('success', 'Data berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        $sejarah->status = !$sejarah->status;
        $sejarah->save();

        return response()->json(['success' => true, 'status' => $sejarah->status]);
    }
}