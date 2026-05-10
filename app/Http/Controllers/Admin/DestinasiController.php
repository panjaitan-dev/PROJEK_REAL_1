<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinasiController extends Controller
{
    private array $kategoriList = ['Alam', 'Buatan', 'Budaya'];

    public function index()
    {
        $destinasi = Destinasi::orderBy('kategori')->orderBy('nama')->paginate(10);
        return view('admin.destinasi.index', compact('destinasi'));
    }

    public function create()
    {
        $kategoriList = $this->kategoriList;
        return view('admin.destinasi.create', compact('kategoriList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'lokasi'       => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144', // Max 6MB
            'tags'         => 'nullable|string',
            'kategori'     => 'required|in:Alam,Buatan,Budaya',
           
        ]);

        // Buat slug unik agar tidak bertabrakan di kolom UNIQUE
        $slug = $this->generateUniqueSlug($request->nama);

        $data = [
            'nama'      => $request->nama,
            'slug'      => $slug,
            'lokasi'    => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            // Kembalikan sebagai ARRAY — model cast 'tags'=>'array' akan encode sendiri
            'tags'      => $this->parseTags($request->tags),
            'kategori'  => $request->kategori,
            // checkbox: ada = 1, tidak ada = 0
            'status'    => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar_utama')) {
            $data['gambar_utama'] = $this->imageToBase64($request->file('gambar_utama'));
        }

        Destinasi::create($data);

        return redirect()->route('admin.destinasi.index')
            ->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $destinasi    = Destinasi::findOrFail($id);
        $kategoriList = $this->kategoriList;
        return view('admin.destinasi.edit', compact('destinasi', 'kategoriList'));
    }

    public function update(Request $request, $id)
    {
        $destinasi = Destinasi::findOrFail($id);

        $request->validate([
            'nama'         => 'required|string|max:255',
            'lokasi'       => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144', // Max 6MB
            'tags'         => 'nullable|string',
            'kategori'     => 'required|in:Alam,Buatan,Budaya',
            'url'          => 'nullable|string|max:255',
        ]);

        // Buat slug baru, kecuali nama tidak berubah (pakai slug yang sudah ada)
        $slug = ($request->nama !== $destinasi->nama)
            ? $this->generateUniqueSlug($request->nama, $id)
            : $destinasi->slug;

        $data = [
            'nama'      => $request->nama,
            'slug'      => $slug,
            'lokasi'    => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            // Kembalikan sebagai ARRAY — model cast 'tags'=>'array' akan encode sendiri
            'tags'      => $this->parseTags($request->tags),
            'kategori'  => $request->kategori,
            'url'       => $request->url,
            'status'    => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar_utama')) {
            $data['gambar_utama'] = $this->imageToBase64($request->file('gambar_utama'));
        }

        $destinasi->update($data);

        return redirect()->route('admin.destinasi.index')
            ->with('success', 'Destinasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        $destinasi->delete();

        return redirect()->route('admin.destinasi.index')
            ->with('success', 'Destinasi berhasil dihapus!');
    }

    // ─── Private helpers ──────────────────────────────────────────────────────

    /**
     * Konversi file gambar ke string base64.
     */
    private function imageToBase64($file): string
    {
        $imageData = file_get_contents($file->getRealPath());
        $base64    = base64_encode($imageData);
        $mimeType  = $file->getMimeType();
        return 'data:' . $mimeType . ';base64,' . $base64;
    }

    /**
     * Ubah string tags (koma-separated) menjadi ARRAY biasa.
     * Model sudah punya cast 'tags' => 'array', jadi tidak perlu json_encode di sini.
     */
    private function parseTags(?string $tags): array
    {
        if (!$tags || trim($tags) === '') {
            return [];
        }

        return array_values(array_filter(array_map('trim', explode(',', $tags))));
    }

    /**
     * Buat slug unik — jika sudah ada di tabel, tambahkan suffix angka.
     * $excludeId digunakan saat update agar baris sendiri tidak dihitung.
     */
    private function generateUniqueSlug(string $nama, ?int $excludeId = null): string
    {
        $base  = Str::slug($nama);
        $slug  = $base;
        $count = 1;

        while (
            Destinasi::where('slug', $slug)
                ->when($excludeId, fn($q) => $q->where('id', '!=', $excludeId))
                ->exists()
        ) {
            $slug = $base . '-' . $count++;
        }

        return $slug;
    }
}
