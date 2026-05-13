<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fasilitas')->truncate();

        $data = [
            // batu_hoda_beach
            [
                'nama'    => 'Dermaga Perahu batu_hoda_beach',
                'deskripsi' => 'Dermaga utama batu_hoda_beach yang melayani penyeberangan antar geosite di Danau Toba. Tersedia jadwal reguler ke Parapat, batu_pasa_pantai, dan museum_huta_bolon. Kapasitas 8 perahu motor dengan kedalaman dermaga yang aman.',
                'gambar'  => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&q=80',
                'harga'   => 'Rp 15.000 - Rp 50.000',
                'geosite' => 'batu_hoda_beach',
                'status'  => true,
            ],
            [
                'nama'    => 'Pusat Informasi Wisata batu_hoda_beach',
                'deskripsi' => 'Kantor informasi wisata resmi di batu_hoda_beach. Menyediakan peta destinasi, informasi tur, pemesanan penginapan, dan pemandu wisata bersertifikat. Buka setiap hari pukul 08.00-17.00 WIB.',
                'gambar'  => 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=800&q=80',
                'harga'   => 'Gratis',
                'geosite' => 'batu_hoda_beach',
                'status'  => true,
            ],
            [
                'nama'    => 'Toilet Umum batu_hoda_beach',
                'deskripsi' => 'Fasilitas toilet umum yang bersih dan terawat di kawasan wisata batu_hoda_beach. Tersedia di 3 titik strategis: dermaga, area parkir, dan dekat penginapan utama. Dilengkapi fasilitas untuk difabel.',
                'gambar'  => 'https://images.unsplash.com/photo-1584568694244-14fbdf83bd30?w=800&q=80',
                'harga'   => 'Rp 2.000',
                'geosite' => 'batu_hoda_beach',
                'status'  => true,
            ],
            // batu_pasa_pantai
            [
                'nama'    => 'Area Parkir batu_pasa_pantai',
                'deskripsi' => 'Area parkir luas berkapasitas 50 mobil dan 100 sepeda motor di dekat gerbang wisata batu_pasa_pantai. Dilengkapi petugas keamanan 24 jam. Akses mudah ke pasar suvenir dan Makam Raja Sidabutar.',
                'gambar'  => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=800&q=80',
                'harga'   => 'Rp 5.000 - Rp 10.000',
                'geosite' => 'batu_pasa_pantai',
                'status'  => true,
            ],
            [
                'nama'    => 'Panggung Pertunjukan Sigale-Gale',
                'deskripsi' => 'Panggung pertunjukan khusus untuk pertunjukan tari Sigale-Gale dan Tor-Tor. Kapasitas 200 penonton. Pertunjukan digelar setiap hari pukul 10.00, 13.00, dan 15.00 WIB.',
                'gambar'  => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=800&q=80',
                'harga'   => 'Rp 25.000 / orang',
                'geosite' => 'batu_pasa_pantai',
                'status'  => true,
            ],
            [
                'nama'    => 'Mushola Wisata batu_pasa_pantai',
                'deskripsi' => 'Mushola bersih dan nyaman untuk wisatawan muslim di kawasan batu_pasa_pantai. Tersedia tempat wudhu yang bersih, sajadah, dan mukena. Kapasitas 30 orang. Buka 24 jam untuk ibadah.',
                'gambar'  => 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?w=800&q=80',
                'harga'   => 'Gratis',
                'geosite' => 'batu_pasa_pantai',
                'status'  => true,
            ],
            // museum_huta_bolon
            [
                'nama'    => 'Pos Kesehatan museum_huta_bolon',
                'deskripsi' => 'Pos kesehatan wisata yang menyediakan pertolongan pertama bagi wisatawan. Dilengkapi tenaga medis terlatih, obat-obatan dasar, dan tandu. Beroperasi setiap hari selama jam wisata berlangsung.',
                'gambar'  => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=800&q=80',
                'harga'   => 'Gratis',
                'geosite' => 'museum_huta_bolon',
                'status'  => true,
            ],
            [
                'nama'    => 'Gazebo Danau museum_huta_bolon',
                'deskripsi' => 'Deretan gazebo di tepi Danau Toba dengan pemandangan yang indah. Tersedia 10 gazebo kayu yang dapat disewa untuk bersantai, piknik keluarga, atau sesi foto. Lokasinya sangat strategis menghadap danau.',
                'gambar'  => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=800&q=80',
                'harga'   => 'Rp 20.000 / jam',
                'geosite' => 'museum_huta_bolon',
                'status'  => true,
            ],
            [
                'nama'    => 'ATM Center museum_huta_bolon',
                'deskripsi' => 'Pusat ATM terdekat di kawasan museum_huta_bolon yang melayani berbagai jenis kartu. Tersedia mesin ATM dari BRI, BNI, Mandiri, dan BCA. Buka 24 jam dan beroperasi setiap hari.',
                'gambar'  => 'https://images.unsplash.com/photo-1601597111158-2fceff292cdc?w=800&q=80',
                'harga'   => 'Gratis',
                'geosite' => 'museum_huta_bolon',
                'status'  => true,
            ],
        ];

        foreach ($data as $item) {
            $item['admin_id']   = 1;
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('fasilitas')->insert($item);
        }

        $this->command->info('✅ FasilitasSeeder: ' . count($data) . ' fasilitas berhasil ditambahkan.');
    }
}
