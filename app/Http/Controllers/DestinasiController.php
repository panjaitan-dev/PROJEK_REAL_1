<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\HomeSetting;
use App\Models\Informasi;

class DestinasiController extends Controller
{
    public function indexX()
    {
        // Ambil semua setting home
        $hs = HomeSetting::allAsArray();

        // Destinasi yang dipilih tampil di home, urut sesuai urutan_home
        $destinasiHome = Destinasi::where('tampil_di_home', true)
            ->where('status', true)
            ->orderBy('urutan_home')
            ->get();

        // Informasi/sejarah aktif (untuk section informasi di home jika ditampilkan)
        $informasiHome = Informasi::where('status', true)
            ->orderBy('urutan')
            ->take(5)
            ->get();

        return view('pages.home', compact('hs', 'destinasiHome', 'informasiHome'));
    }

    public function index()
    {
        return view('destinasi.index');
    }

    /**
     * Menampilkan destinasi berdasarkan kategori dari database.
     */
    private function showKategori(string $kategoriNama, string $deskripsi)
    {
        $destinasi = Destinasi::where('kategori', $kategoriNama)
            ->where('status', true)
            ->get();

        return view('destinasi.kategori', compact('destinasi'))
            ->with('kategori', $kategoriNama)
            ->with('deskripsi', $deskripsi);
    }

    // Destinasi Alam
    public function alam()
    {
        return $this->showKategori(
            'Alam',
            'Destinasi wisata alam yang menampilkan keindahan geologi, pegunungan, air terjun, dan keunikan alam Danau Toba.'
        );
    }

    // Destinasi Buatan
    public function buatan()
    {
        return $this->showKategori(
            'Buatan',
            'Destinasi wisata buatan manusia yang menjadi ikon dan daya tarik wisata di kawasan Danau Toba.'
        );
    }

    // Destinasi Budaya
    public function budaya()
    {
        return $this->showKategori(
            'Budaya',
            'Destinasi wisata budaya yang menampilkan kearifan lokal, adat istiadat, dan warisan leluhur Batak Toba.'
        );
    }

    /**
     * Menampilkan halaman detail destinasi berdasarkan slug.
     */
    public function detail(string $slug)
    {
        $destinasi = Destinasi::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        return view('destinasi.detail', compact('destinasi'));
    }
}