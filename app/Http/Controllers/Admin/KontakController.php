<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    private array $tipeList = [
        'alamat' => 'Alamat',
        'telepon' => 'Telepon / WhatsApp',
        'email' => 'Email',
        'sosmed' => 'Media Sosial',
        'jam_operasional' => 'Jam Operasional'
    ];

    public function index()
    {
        $kontak = Kontak::orderBy('tipe')->orderBy('judul')->paginate(10);
        $tipeList = $this->tipeList;
        return view('admin.kontak.index', compact('kontak', 'tipeList'));
    }

    public function create()
    {
        $tipeList = $this->tipeList;
        return view('admin.kontak.create', compact('tipeList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe'           => 'required|in:alamat,telepon,email,sosmed,jam_operasional',
            'judul'          => 'required|string|max:255',
            'nilai'          => 'required|string',
            'nilai_tambahan' => 'nullable|string|max:255',
            'icon'           => 'nullable|string|max:100',
            'tautan'         => 'nullable|string|max:1000',
            'status'         => 'nullable|boolean',
        ]);

        Kontak::create([
            'tipe'           => $request->tipe,
            'judul'          => $request->judul,
            'nilai'          => $request->nilai,
            'nilai_tambahan' => $request->nilai_tambahan,
            'icon'           => $request->icon,
            'tautan'         => $request->tautan,
            'status'         => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Kontak berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        $tipeList = $this->tipeList;
        return view('admin.kontak.edit', compact('kontak', 'tipeList'));
    }

    public function update(Request $request, $id)
    {
        $kontak = Kontak::findOrFail($id);

        $request->validate([
            'tipe'           => 'required|in:alamat,telepon,email,sosmed,jam_operasional',
            'judul'          => 'required|string|max:255',
            'nilai'          => 'required|string',
            'nilai_tambahan' => 'nullable|string|max:255',
            'icon'           => 'nullable|string|max:100',
            'tautan'         => 'nullable|string|max:1000',
            'status'         => 'nullable|boolean',
        ]);

        $kontak->update([
            'tipe'           => $request->tipe,
            'judul'          => $request->judul,
            'nilai'          => $request->nilai,
            'nilai_tambahan' => $request->nilai_tambahan,
            'icon'           => $request->icon,
            'tautan'         => $request->tautan,
            'status'         => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Kontak berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Kontak berhasil dihapus!');
    }
}
