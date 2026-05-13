<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenginapanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('penginapan')->truncate();

        $data = [
            // batu_hoda_beach
            [
                'nama'    => 'Carolina Hotel batu_hoda_beach',
                'deskripsi' => 'Hotel legendaris di batu_hoda_beach sejak 1970-an. Kamar nyaman dengan pemandangan Danau Toba, restoran, kolam renang, dan penyewaan sepeda.',
                'gambar'  => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&q=80',
                'harga'   => 'Rp 250.000 - Rp 600.000 / malam',
                'kontak'  => '+62 625 451234',
                'geosite' => 'batu_hoda_beach',
                'status'  => true,
            ],
            [
                'nama'    => 'Tabo Cottages batu_hoda_beach',
                'deskripsi' => 'Cottage bergaya rumah adat Batak autentik. Setiap cottage memiliki teras pribadi menghadap danau. Sarapan khas Batak tersedia setiap pagi.',
                'gambar'  => 'https://images.unsplash.com/photo-1596436889106-be35e843f974?w=800&q=80',
                'harga'   => 'Rp 400.000 - Rp 900.000 / malam',
                'kontak'  => '+62 625 451456',
                'geosite' => 'batu_hoda_beach',
                'status'  => true,
            ],
            [
                'nama'    => 'Silintong Boutique Hotel',
                'deskripsi' => 'Boutique hotel modern dengan sentuhan desain Batak elegan. Kamar deluxe dengan balkon pemandangan danau, restoran, dan layanan shuttle boat.',
                'gambar'  => 'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800&q=80',
                'harga'   => 'Rp 550.000 - Rp 1.200.000 / malam',
                'kontak'  => '+62 625 451789',
                'geosite' => 'batu_hoda_beach',
                'status'  => true,
            ],
            // batu_pasa_pantai
            [
                'nama'    => 'Penginapan batu_pasa_pantai Indah',
                'deskripsi' => 'Penginapan keluarga dekat pasar suvenir batu_pasa_pantai. Kamar bersih dan nyaman dengan harga terjangkau. Cocok untuk backpacker dan wisatawan lokal.',
                'gambar'  => 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800&q=80',
                'harga'   => 'Rp 150.000 - Rp 300.000 / malam',
                'kontak'  => '+62 813 9876 5432',
                'geosite' => 'batu_pasa_pantai',
                'status'  => true,
            ],
            [
                'nama'    => 'Samosir Villa Resort batu_pasa_pantai',
                'deskripsi' => 'Villa resort premium di perbukitan batu_pasa_pantai. Setiap villa dilengkapi private pool. Fasilitas spa tradisional menggunakan rempah lokal tersedia.',
                'gambar'  => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&q=80',
                'harga'   => 'Rp 1.500.000 - Rp 3.500.000 / malam',
                'kontak'  => '+62 812 3456 7890',
                'geosite' => 'batu_pasa_pantai',
                'status'  => true,
            ],
            [
                'nama'    => 'Homestay Batak batu_pasa_pantai',
                'deskripsi' => 'Pengalaman menginap autentik di rumah warga Batak asli. Belajar budaya, masakan, dan tradisi Batak Toba langsung dari keluarga lokal.',
                'gambar'  => 'https://images.unsplash.com/photo-1586611292717-f828b167408c?w=800&q=80',
                'harga'   => 'Rp 200.000 - Rp 400.000 / malam',
                'kontak'  => '+62 821 5555 4444',
                'geosite' => 'batu_pasa_pantai',
                'status'  => true,
            ],
            // museum_huta_bolon
            [
                'nama'    => 'museum_huta_bolon Beach Hotel',
                'deskripsi' => 'Hotel tepi danau dengan dermaga pribadi. Aktivitas: snorkeling, kayak, tur sepeda. Restoran menyajikan ikan bakar Danau Toba segar.',
                'gambar'  => 'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&q=80',
                'harga'   => 'Rp 350.000 - Rp 750.000 / malam',
                'kontak'  => '+62 625 891234',
                'geosite' => 'museum_huta_bolon',
                'status'  => true,
            ],
            [
                'nama'    => 'Penginapan Sopo Nagok museum_huta_bolon',
                'deskripsi' => 'Rumah panggung Batak dari kayu pilihan dengan ukiran gorga khas. Hanya 5 menit dari situs megalitik museum_huta_bolon. Pemandu wisata lokal tersedia.',
                'gambar'  => 'https://images.unsplash.com/photo-1602002418082-a4443e081dd1?w=800&q=80',
                'harga'   => 'Rp 250.000 - Rp 500.000 / malam',
                'kontak'  => '+62 813 1234 5678',
                'geosite' => 'museum_huta_bolon',
                'status'  => true,
            ],
            [
                'nama'    => 'Lake View Guesthouse museum_huta_bolon',
                'deskripsi' => 'Guesthouse di ketinggian dengan panoramik Danau Toba. Wi-Fi gratis, sarapan termasuk. Dekat pasar lokal dan kuliner khas Batak.',
                'gambar'  => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800&q=80',
                'harga'   => 'Rp 180.000 - Rp 380.000 / malam',
                'kontak'  => '+62 822 8888 7777',
                'geosite' => 'museum_huta_bolon',
                'status'  => true,
            ],
        ];

        foreach ($data as $item) {
            $item['admin_id']   = 1;
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('penginapan')->insert($item);
        }

        $this->command->info('✅ PenginapanSeeder: ' . count($data) . ' penginapan berhasil ditambahkan.');
    }
}
