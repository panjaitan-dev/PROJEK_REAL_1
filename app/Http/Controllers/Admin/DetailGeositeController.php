<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailGeosite;
use Illuminate\Http\Request;

class DetailGeositeController extends Controller
{
    private array $geositeList = [
        'batu_hoda_beach'   => 'Batu Hoda Beach',
        'museum_huta_bolon' => 'Museum Huta Bolon',
        'batu_pasa_pantai'  => 'Batu Pasa Pantai',
    ];

    public function index()
    {
        $geositeList = $this->geositeList;
        $details = DetailGeosite::all()->keyBy('geosite');
        return view('admin.detail-geosite.index', compact('geositeList', 'details'));
    }

    public function edit($geosite)
    {
        if (!array_key_exists($geosite, $this->geositeList)) {
            abort(404);
        }
        $namaGeosite = $this->geositeList[$geosite];
        $detail = DetailGeosite::firstOrNew(['geosite' => $geosite]);
        return view('admin.detail-geosite.edit', compact('geosite', 'namaGeosite', 'detail'));
    }

    public function update(Request $request, $geosite)
    {
        if (!array_key_exists($geosite, $this->geositeList)) {
            abort(404);
        }

        $request->validate([
            'maps_url'    => 'nullable|string',
            'jam_buka'    => 'nullable|string|max:255',
            'harga_tiket' => 'nullable|string|max:255',
        ]);

        DetailGeosite::updateOrCreate(
            ['geosite' => $geosite],
            [
                'maps_url'    => $request->maps_url,
                'jam_buka'    => $request->jam_buka,
                'harga_tiket' => $request->harga_tiket,
            ]
        );

        return redirect()
            ->route('admin.detail-geosite.index')
            ->with('success', 'Detail geosite berhasil diperbarui!');
    }
}
