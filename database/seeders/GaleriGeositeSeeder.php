<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriGeositeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('galeri_geosite')->truncate();

        $data = [
            // TUKTUK
            [
                'judul'    => 'Sunrise di Tuk-Tuk',
                'kategori' => 'landscape',
                'gambar'   => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80',
                'geosite'  => 'tuktuk',
                'status'   => true,
            ],
            [
                'judul'    => 'Perahu Tradisional Tuk-Tuk',
                'kategori' => 'aktivitas',
                'gambar'   => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&q=80',
                'geosite'  => 'tuktuk',
                'status'   => true,
            ],
            [
                'judul'    => 'Kehidupan Lokal Tuk-Tuk',
                'kategori' => 'budaya',
                'gambar'   => 'https://images.unsplash.com/photo-1518684079-3c830dcef090?w=800&q=80',
                'geosite'  => 'tuktuk',
                'status'   => true,
            ],
            [
                'judul'    => 'Danau Toba dari Tuk-Tuk',
                'kategori' => 'landscape',
                'gambar'   => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=800&q=80',
                'geosite'  => 'tuktuk',
                'status'   => true,
            ],
            // TOMOK
            [
                'judul'    => 'Makam Raja Sidabutar',
                'kategori' => 'heritage',
                'gambar'   => 'https://images.unsplash.com/photo-1568454537842-d933259bb258?w=800&q=80',
                'geosite'  => 'tomok',
                'status'   => true,
            ],
            [
                'judul'    => 'Pertunjukan Sigale-Gale Tomok',
                'kategori' => 'budaya',
                'gambar'   => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=800&q=80',
                'geosite'  => 'tomok',
                'status'   => true,
            ],
            [
                'judul'    => 'Pasar Suvenir Tomok',
                'kategori' => 'aktivitas',
                'gambar'   => 'https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a?w=800&q=80',
                'geosite'  => 'tomok',
                'status'   => true,
            ],
            [
                'judul'    => 'Pemandangan Danau dari Tomok',
                'kategori' => 'landscape',
                'gambar'   => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800&q=80',
                'geosite'  => 'tomok',
                'status'   => true,
            ],
            // AMBARITA
            [
                'judul'    => 'Situs Megalitik Ambarita',
                'kategori' => 'heritage',
                'gambar'   => 'https://images.unsplash.com/photo-1548013146-72479768bada?w=800&q=80',
                'geosite'  => 'ambarita',
                'status'   => true,
            ],
            [
                'judul'    => 'Tenun Ulos Ambarita',
                'kategori' => 'budaya',
                'gambar'   => 'https://images.unsplash.com/photo-1558769132-cb1aea458c5e?w=800&q=80',
                'geosite'  => 'ambarita',
                'status'   => true,
            ],
            [
                'judul'    => 'Tepi Danau Ambarita',
                'kategori' => 'landscape',
                'gambar'   => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?w=800&q=80',
                'geosite'  => 'ambarita',
                'status'   => true,
            ],
            [
                'judul'    => 'Nelayan Danau Toba Ambarita',
                'kategori' => 'aktivitas',
                'gambar'   => 'https://images.unsplash.com/photo-1534482421-64566f976cfa?w=800&q=80',
                'geosite'  => 'ambarita',
                'status'   => true,
            ],
        ];

        foreach ($data as $item) {
            $item['admin_id']   = 1;
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('galeri_geosite')->insert($item);
        }

        $this->command->info('✅ GaleriGeositeSeeder: ' . count($data) . ' foto berhasil ditambahkan.');
    }
}
