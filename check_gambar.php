<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$items = DB::table('galeri_geosite')->get();
foreach ($items as $item) {
    echo "ID: {$item->id} | Judul: {$item->judul} | Gambar: " . substr($item->gambar, 0, 100) . "...\n";
}
?>
