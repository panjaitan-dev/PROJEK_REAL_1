<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // ── Core ─────────────────────────────────────────
            UserSeeder::class,
            InformasiSeeder::class,

            // ── Konten Utama ─────────────────────────────────
            BeritaSeeder::class,
            GaleriSeeder::class,
            DestinasiSeeder::class,

            // ── Geosite Content ───────────────────────────────
            UmkmSeeder::class,
            PenginapanSeeder::class,
            FasilitasSeeder::class,
            GaleriGeositeSeeder::class,
            InformasiGeositeSeeder::class,
        ]);
    }
}