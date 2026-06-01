<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

foreach (['Umkm', 'Penginapan', 'Fasilitas'] as $modelName) {
    $class = "App\\Models\\$modelName";
    $records = $class::all();
    echo "--- $modelName ({$records->count()}) ---\n";
    foreach ($records as $item) {
        echo "ID: {$item->id} | Nama: {$item->nama} | Geosite: {$item->geosite} | Gambar: {$item->gambar} | Status: {$item->status}\n";
    }
}
