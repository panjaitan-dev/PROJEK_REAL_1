<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSettingController extends Controller
{
    public function index()
    {
        $s = HomeSetting::allAsArray();

        // Semua destinasi untuk dipilih mana yang tampil di home
        $destinasiList = Destinasi::orderBy('nama')->get();

        return view('admin.home.index', compact('s', 'destinasiList'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_subtitle'      => 'nullable|string|max:255',
            'hero_title'         => 'nullable|string|max:255',
            'stat_geosites'      => 'nullable|string|max:50',
            'stat_geosites_label'=> 'nullable|string|max:100',
            'stat_sejarah'       => 'nullable|string|max:50',
            'stat_sejarah_label' => 'nullable|string|max:100',
            'stat_warisan'       => 'nullable|string|max:50',
            'stat_warisan_label' => 'nullable|string|max:100',
            'stat_umkm'          => 'nullable|string|max:50',
            'stat_umkm_label'    => 'nullable|string|max:100',
            'warisan_judul'      => 'nullable|string|max:255',
            'warisan_paragraf_1' => 'nullable|string',
            'warisan_paragraf_2' => 'nullable|string',
            'warisan_gambar'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'destinasi_judul'    => 'nullable|string|max:255',
            'destinasi_subjudul' => 'nullable|string|max:255',
            'cta_judul'          => 'nullable|string|max:255',
            'cta_deskripsi'      => 'nullable|string',
        ]);

        // Simpan semua text settings
        $textKeys = [
            'hero_subtitle', 'hero_title',
            'stat_geosites', 'stat_geosites_label',
            'stat_sejarah', 'stat_sejarah_label',
            'stat_warisan', 'stat_warisan_label',
            'stat_umkm', 'stat_umkm_label',
            'warisan_judul', 'warisan_paragraf_1', 'warisan_paragraf_2',
            'destinasi_judul', 'destinasi_subjudul',
            'cta_judul', 'cta_deskripsi',
        ];

        foreach ($textKeys as $key) {
            HomeSetting::set($key, $request->input($key, ''));
        }

        // Upload gambar warisan jika ada
        if ($request->hasFile('warisan_gambar')) {
            // Hapus gambar lama
            $old = HomeSetting::get('warisan_gambar');
            if ($old && Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }
            $path = $request->file('warisan_gambar')->store('home', 'public');
            HomeSetting::set('warisan_gambar', $path);
        }

        // Update destinasi yang tampil di home
        $selectedIds = $request->input('destinasi_home', []);
        $urutan      = $request->input('urutan_home', []);

        // Reset semua destinasi
        Destinasi::query()->update(['tampil_di_home' => false, 'urutan_home' => 0]);

        foreach ($selectedIds as $id) {
            Destinasi::where('id', $id)->update([
                'tampil_di_home' => true,
                'urutan_home'    => $urutan[$id] ?? 0,
            ]);
        }

        return redirect()->route('admin.home-settings.index')
            ->with('success', 'Pengaturan halaman Home berhasil disimpan!');
    }
}
