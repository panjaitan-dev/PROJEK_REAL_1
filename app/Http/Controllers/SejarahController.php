<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;

class SejarahController extends Controller
{
    public function index()
    {
        $sejarahList = Sejarah::where('status', 1)
            ->orderBy('urutan', 'asc')
            ->get();

        return view('pages.sejarah', compact('sejarahList'));
    }
}