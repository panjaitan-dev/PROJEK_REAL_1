<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailGeosite;
use Illuminate\Http\Request;

class DetailGeositeController extends Controller
{
    // FIX: Index sekarang langsung mengambil APAPUN yang ada di database tabel detail_geosites
    public function index()
    {
        $details = DetailGeosite::all();
        return view('admin.detail-geosite.index', compact('details'));
    }

    public function create()
    {
        return view('admin.detail-geosite.create');
    }

    // FIX: Edit menggunakan ID database agar aman dan fleksibel untuk nama buatan baru
    public function edit($id)
    {
        $detail = DetailGeosite::findOrFail($id);
        $namaGeosite = ucwords(str_replace('_', ' ', $detail->geosite));
        return view('admin.detail-geosite.edit', compact('detail', 'namaGeosite'));
    }

    public function update(Request $request, $id)
    {
        $detail = DetailGeosite::findOrFail($id);

        $request->validate([
            'geosite'     => 'required|string|max:255|unique:detail_geosites,geosite,' . $id,
            'maps_url'    => 'nullable|string',
            'jam_buka'    => 'nullable|string|max:255',
            'harga_tiket' => 'nullable|string|max:255',
        ]);

        $detail->update([
            'geosite'     => $request->geosite,
            'maps_url'    => $request->maps_url,
            'jam_buka'    => $request->jam_buka,
            'harga_tiket' => $request->harga_tiket,
        ]);

        return redirect()
            ->route('admin.detail-geosite.index')
            ->with('success', 'Detail geosite berhasil diperbarui!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'geosite'     => 'required|string|max:255|unique:detail_geosites,geosite',
            'maps_url'    => 'nullable|string',
            'jam_buka'    => 'nullable|string|max:255',
            'harga_tiket' => 'nullable|string|max:255',
        ], [
            'geosite.required' => 'Nama geosite wajib diisi.',
            'geosite.unique'   => 'Nama geosite ini sudah ada di tabel, silakan gunakan tombol edit.',
        ]);

        DetailGeosite::create([
            'geosite'     => $request->geosite,
            'maps_url'    => $request->maps_url,
            'jam_buka'    => $request->jam_buka,
            'harga_tiket' => $request->harga_tiket,
        ]);

        return redirect()
            ->route('admin.detail-geosite.index')
            ->with('success', 'Data berhasil ditambahkan');
    }
    public function destroy($id)
{
    $detail = DetailGeosite::findOrFail($id);
    $detail->delete();

    return redirect()
        ->route('admin.detail-geosite.index')
        ->with('success', 'Data geosite berhasil dihapus!');
}
}
