<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function umkm()
    {
        return view('pages.umkm');
    }

    public function budaya()
    {
        return view('pages.budaya');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }

    public function sendKontak(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'telepon' => 'nullable|string|max:30',
            'subjek'  => 'required|string|max:255',
            'pesan'   => 'required|string',
        ]);

        try {
            \Illuminate\Support\Facades\Mail::to('adminsimanindobatuhoda@gmail.com')->send(
                new \App\Mail\ContactMail(
                    $request->nama,
                    $request->email,
                    $request->telepon,
                    $request->subjek,
                    $request->pesan
                )
            );

            return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera membalas email Anda.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Gagal mengirim pesan: ' . $e->getMessage()]);
        }
    }
}
