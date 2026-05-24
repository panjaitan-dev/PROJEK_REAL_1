<?php
// Script sync: galeri_geosite -> galeri
// Jalankan: php sync_galeri.php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\GaleriGeosite;
use App\Models\Galeri;

$synced = 0;
$skipped = 0;

GaleriGeosite::all()->each(function ($g) use (&$synced, &$skipped) {
    // Cek apakah sudah punya entri galeri
    $exists = Galeri::where('galeri_geosite_id', $g->id)->exists();
    if (!$exists) {
        Galeri::create([
            'judul'             => $g->judul,
            'kategori'          => $g->kategori,
            'deskripsi'         => 'Foto dari ' . str_replace('_', ' ', $g->geosite),
            'gambar'            => $g->gambar,
            'lokasi'            => str_replace('_', ' ', $g->geosite),
            'status'            => $g->status,
            'galeri_geosite_id' => $g->id,
        ]);
        $synced++;
        echo "  [OK] Synced: {$g->judul}\n";
    } else {
        $skipped++;
        echo "  [SKIP] Already exists: {$g->judul}\n";
    }
});

echo "\nSelesai! Synced: {$synced} | Skipped: {$skipped}\n";
