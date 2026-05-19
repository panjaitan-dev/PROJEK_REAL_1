<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavbarItem;
use Illuminate\Http\Request;

class NavbarItemController extends Controller
{
    public function index()
    {
        $navbarItems = NavbarItem::orderBy('geosite')
            ->orderBy('urutan')
            ->paginate(15);

        return view('admin.navbar-items.index', compact('navbarItems'));
    }

    public function create()
    {
        return view('admin.navbar-items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'geosite' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'href' => 'required|string|max:255',
            'urutan' => 'required|integer',
            'status' => 'nullable|boolean',
        ]);

        NavbarItem::create([
            'geosite' => $request->geosite,
            'label' => $request->label,
            'href' => $request->href,
            'urutan' => $request->urutan,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.navbar-items.index')
            ->with('success', 'Item navbar berhasil ditambahkan.');
    }

    public function show($id)
    {
        return redirect()->route('admin.navbar-items.edit', $id);
    }

    public function edit($id)
    {
        $item = NavbarItem::findOrFail($id);
        return view('admin.navbar-items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = NavbarItem::findOrFail($id);

        $request->validate([
            'geosite' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'href' => 'required|string|max:255',
            'urutan' => 'required|integer',
            'status' => 'nullable|boolean',
        ]);

        $item->update([
            'geosite' => $request->geosite,
            'label' => $request->label,
            'href' => $request->href,
            'urutan' => $request->urutan,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.navbar-items.index')
            ->with('success', 'Item navbar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = NavbarItem::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.navbar-items.index')
            ->with('success', 'Item navbar berhasil dihapus.');
    }
}
