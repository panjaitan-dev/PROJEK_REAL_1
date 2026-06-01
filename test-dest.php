<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$destinasi = App\Models\Destinasi::all();
echo "Total Destinasi: " . $destinasi->count() . "\n";
foreach ($destinasi as $d) {
    echo "ID: {$d->id} | Nama: {$d->nama} | Kategori: {$d->kategori} | Gambar Utama: {$d->gambar_utama} | Status: {$d->status}\n";
}
