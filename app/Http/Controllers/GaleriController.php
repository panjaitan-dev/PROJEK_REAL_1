<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // Halaman galeri publik
    public function index()
    {
        // Ambil semua data galeri yang status aktif
        $allGaleri = Galeri::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();

        // Kelompokkan secara dinamis berdasarkan kolom kategori di DB
        $galeriByKategori = $allGaleri->groupBy('kategori');

        return view('pages.galeri', compact('galeriByKategori'));
    }

    // Fungsi untuk Admin menyimpan foto baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageData = file_get_contents($file->getRealPath());
            $base64    = base64_encode($imageData);
            $mimeType  = $file->getMimeType();

            Galeri::create([
                'judul'        => $request->judul,
                'kategori'     => $request->kategori,
                'deskripsi'    => $request->deskripsi,
                'gambar'       => 'data:' . $mimeType . ';base64,' . $base64,
                'status'       => true,
                'tanggal_foto' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Foto Berhasil Ditambahkan!');
    }
}