<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UmkmSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('umkm')->truncate();

        $data = [
            // batu_hoda_beach
            [
                'nama'    => 'Ulos Batak Sihombing',
                'deskripsi' => 'Toko ulos tradisional Batak yang menjual kain tenun asli buatan tangan pengrajin lokal Samosir. Tersedia berbagai motif ulos seperti Ragi Hotang, Sadum, dan Sibolang dengan kualitas premium.',
                'gambar'  => 'https://images.unsplash.com/photo-1558769132-cb1aea458c5e?w=800&q=80',
                'lokasi'  => 'Jl. batu_hoda_beach Siadong No. 12, Samosir',
                'kontak'  => '+62 813 1111 2222',
                'geosite' => 'batu_hoda_beach',
                'status'  => true,
            ],
            [
                'nama'    => 'Warung Arsik Bu Rohana',
                'deskripsi' => 'Warung makan dengan spesialisasi ikan arsik khas Batak Toba. Ikan mas segar dimasak dengan bumbu kunyit, asam kersik, dan rempah pilihan. Tempat makan favorit wisatawan dan warga lokal sejak 1998.',
                'gambar'  => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800&q=80',
                'lokasi'  => 'Dermaga batu_hoda_beach, Samosir',
                'kontak'  => '+62 821 3333 4444',
                'geosite' => 'batu_hoda_beach',
                'status'  => true,
            ],
            [
                'nama'    => 'Kerajinan Gorga Samosir',
                'deskripsi' => 'Workshop dan toko souvenir kerajinan ukiran gorga Batak. Menjual patung kayu, tempat penyimpanan ukir, perhiasan perak tradisional, dan miniatur rumah adat Batak. Pengunjung dapat melihat langsung proses pembuatan.',
                'gambar'  => 'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?w=800&q=80',
                'lokasi'  => 'Jl. Seni batu_hoda_beach No. 5, Samosir',
                'kontak'  => '+62 812 5555 6666',
                'geosite' => 'batu_hoda_beach',
                'status'  => true,
            ],
            // batu_pasa_pantai
            [
                'nama'    => 'Oleh-Oleh Khas batu_pasa_pantai Siallagan',
                'deskripsi' => 'Toko oleh-oleh terlengkap di batu_pasa_pantai. Menjual miniatur Sigale-Gale, kain ulos, gelang silver Batak, kaos Danau Toba, dan aneka makanan khas seperti dengke naniura kemasan.',
                'gambar'  => 'https://images.unsplash.com/photo-1513519245088-0e12902e5a38?w=800&q=80',
                'lokasi'  => 'Pasar Suvenir batu_pasa_pantai, Samosir',
                'kontak'  => '+62 813 7777 8888',
                'geosite' => 'batu_pasa_pantai',
                'status'  => true,
            ],
            [
                'nama'    => 'Resto Danau Biru batu_pasa_pantai',
                'deskripsi' => 'Restoran di tepi Danau Toba dengan menu andalan saksang (daging babi/kambing) dan naniura (ikan mentah khas Batak). Dilengkapi tempat duduk terbuka menghadap danau dan live music gondang setiap akhir pekan.',
                'gambar'  => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=800&q=80',
                'lokasi'  => 'Pinggir Danau batu_pasa_pantai, Samosir',
                'kontak'  => '+62 822 9999 0000',
                'geosite' => 'batu_pasa_pantai',
                'status'  => true,
            ],
            [
                'nama'    => 'Tenun Tradisional Ibu Naomi',
                'deskripsi' => 'Workshop tenun ulos yang masih menggunakan alat tenun tradisional. Ibu Naomi dan keluarga memproduksi ulos Batak berkualitas tinggi dengan motif leluhur. Wisatawan dapat belajar menenun langsung.',
                'gambar'  => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80',
                'lokasi'  => 'Desa batu_pasa_pantai Barat, Samosir',
                'kontak'  => '+62 815 2222 1111',
                'geosite' => 'batu_pasa_pantai',
                'status'  => true,
            ],
            // museum_huta_bolon
            [
                'nama'    => 'Kopi Samosir museum_huta_bolon',
                'deskripsi' => 'Kedai kopi spesialti yang menyajikan biji kopi Arabika Samosir pilihan. Proses roasting dilakukan sendiri dengan metode tradisional. Tersedia aneka varian kopi single origin dan juga dijual dalam kemasan untuk oleh-oleh.',
                'gambar'  => 'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?w=800&q=80',
                'lokasi'  => 'Jl. Siallagan museum_huta_bolon No. 3, Samosir',
                'kontak'  => '+62 812 4444 3333',
                'geosite' => 'museum_huta_bolon',
                'status'  => true,
            ],
            [
                'nama'    => 'Perikanan Danau Toba museum_huta_bolon',
                'deskripsi' => 'Usaha perikanan dan olahan ikan Danau Toba. Menjual ikan mas, ikan batak (dekke), dan nila segar langsung dari karamba. Tersedia pula produk ikan olahan seperti ikan asin, ikan salai (asap), dan abon ikan.',
                'gambar'  => 'https://images.unsplash.com/photo-1534482421-64566f976cfa?w=800&q=80',
                'lokasi'  => 'Dermaga museum_huta_bolon, Samosir',
                'kontak'  => '+62 813 6666 5555',
                'geosite' => 'museum_huta_bolon',
                'status'  => true,
            ],
            [
                'nama'    => 'Batik Gorga museum_huta_bolon',
                'deskripsi' => 'Usaha batik dengan motif gorga Batak yang unik. Menggabungkan teknik batik tulis dengan ornamen tradisional Batak menghasilkan karya tekstil bernilai seni tinggi. Tersedia kemeja, blus, sarung, dan syal.',
                'gambar'  => 'https://images.unsplash.com/photo-1567401893414-76b7b1e5a7a5?w=800&q=80',
                'lokasi'  => 'Jl. Budaya museum_huta_bolon No. 7, Samosir',
                'kontak'  => '+62 821 7777 6666',
                'geosite' => 'museum_huta_bolon',
                'status'  => true,
            ],
        ];

        foreach ($data as $item) {
            $item['admin_id']   = 1;
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('umkm')->insert($item);
        }

        $this->command->info('✅ UmkmSeeder: ' . count($data) . ' UMKM berhasil ditambahkan.');
    }
}
