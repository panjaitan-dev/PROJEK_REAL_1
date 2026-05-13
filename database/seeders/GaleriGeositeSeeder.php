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
            // batu_hoda_beach
            [
                'judul'    => 'Sunrise di batu_hoda_beach',
                'kategori' => 'landscape',
                'gambar'   => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80',
                'geosite'  => 'batu_hoda_beach',
                'status'   => true,
            ],
            [
                'judul'    => 'Perahu Tradisional batu_hoda_beach',
                'kategori' => 'aktivitas',
                'gambar'   => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&q=80',
                'geosite'  => 'batu_hoda_beach',
                'status'   => true,
            ],
            [
                'judul'    => 'Kehidupan Lokal batu_hoda_beach',
                'kategori' => 'budaya',
                'gambar'   => 'https://images.unsplash.com/photo-1518684079-3c830dcef090?w=800&q=80',
                'geosite'  => 'batu_hoda_beach',
                'status'   => true,
            ],
            [
                'judul'    => 'Danau Toba dari batu_hoda_beach',
                'kategori' => 'landscape',
                'gambar'   => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=800&q=80',
                'geosite'  => 'batu_hoda_beach',
                'status'   => true,
            ],
            // batu_pasa_pantai
            [
                'judul'    => 'Makam Raja Sidabutar',
                'kategori' => 'heritage',
                'gambar'   => 'https://images.unsplash.com/photo-1568454537842-d933259bb258?w=800&q=80',
                'geosite'  => 'batu_pasa_pantai',
                'status'   => true,
            ],
            [
                'judul'    => 'Pertunjukan Sigale-Gale batu_pasa_pantai',
                'kategori' => 'budaya',
                'gambar'   => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=800&q=80',
                'geosite'  => 'batu_pasa_pantai',
                'status'   => true,
            ],
            [
                'judul'    => 'Pasar Suvenir batu_pasa_pantai',
                'kategori' => 'aktivitas',
                'gambar'   => 'https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a?w=800&q=80',
                'geosite'  => 'batu_pasa_pantai',
                'status'   => true,
            ],
            [
                'judul'    => 'Pemandangan Danau dari batu_pasa_pantai',
                'kategori' => 'landscape',
                'gambar'   => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800&q=80',
                'geosite'  => 'batu_pasa_pantai',
                'status'   => true,
            ],
            // museum_huta_bolon
            [
                'judul'    => 'Situs Megalitik museum_huta_bolon',
                'kategori' => 'heritage',
                'gambar'   => 'https://images.unsplash.com/photo-1548013146-72479768bada?w=800&q=80',
                'geosite'  => 'museum_huta_bolon',
                'status'   => true,
            ],
            [
                'judul'    => 'Tenun Ulos museum_huta_bolon',
                'kategori' => 'budaya',
                'gambar'   => 'https://images.unsplash.com/photo-1558769132-cb1aea458c5e?w=800&q=80',
                'geosite'  => 'museum_huta_bolon',
                'status'   => true,
            ],
            [
                'judul'    => 'Tepi Danau museum_huta_bolon',
                'kategori' => 'landscape',
                'gambar'   => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?w=800&q=80',
                'geosite'  => 'museum_huta_bolon',
                'status'   => true,
            ],
            [
                'judul'    => 'Nelayan Danau Toba museum_huta_bolon',
                'kategori' => 'aktivitas',
                'gambar'   => 'https://images.unsplash.com/photo-1534482421-64566f976cfa?w=800&q=80',
                'geosite'  => 'museum_huta_bolon',
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
