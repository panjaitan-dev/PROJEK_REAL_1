<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('galeri')->truncate();

        $data = [
            [
                'judul'       => 'Panorama Danau Toba dari Udara',
                'kategori'    => 'Landscape',
                'deskripsi'   => 'Pemandangan spektakuler Danau Toba dari ketinggian yang memperlihatkan luasnya danau vulkanik terbesar di dunia.',
                'gambar'      => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=800&q=80',
                'lokasi'      => 'Danau Toba, Sumatera Utara',
                'tanggal_foto'=> '2025-03-15',
                'status'      => true,
            ],
            [
                'judul'       => 'Rumah Adat Batak di Samosir',
                'kategori'    => 'Budaya',
                'deskripsi'   => 'Rumah adat Batak Toba dengan arsitektur khas atap melengkung dan ukiran gorga yang penuh warna dan makna simbolik.',
                'gambar'      => 'https://images.unsplash.com/photo-1518684079-3c830dcef090?w=800&q=80',
                'lokasi'      => 'Samosir, Sumatera Utara',
                'tanggal_foto'=> '2025-02-20',
                'status'      => true,
            ],
            [
                'judul'       => 'Pertunjukan Tor-Tor di Simanindo',
                'kategori'    => 'Budaya',
                'deskripsi'   => 'Penari Tor-Tor menampilkan keindahan gerak tari tradisional Batak di panggung Museum Huta Bolon Simanindo.',
                'gambar'      => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=800&q=80',
                'lokasi'      => 'Simanindo, Samosir',
                'tanggal_foto'=> '2025-01-10',
                'status'      => true,
            ],
            [
                'judul'       => 'Perahu Tradisional di batu_hoda_beach',
                'kategori'    => 'Wisata',
                'deskripsi'   => 'Perahu motor tradisional berjajar rapi di dermaga batu_hoda_beach, siap mengantarkan wisatawan menjelajahi keindahan Danau Toba.',
                'gambar'      => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&q=80',
                'lokasi'      => 'batu_hoda_beach, Samosir',
                'tanggal_foto'=> '2025-04-05',
                'status'      => true,
            ],
            [
                'judul'       => 'Tenun Ulos Tradisional museum_huta_bolon',
                'kategori'    => 'Budaya',
                'deskripsi'   => 'Pengrajin ulos Batak sedang menenun kain ulos menggunakan alat tenun tradisional yang diwarisi turun-temurun.',
                'gambar'      => 'https://images.unsplash.com/photo-1558769132-cb1aea458c5e?w=800&q=80',
                'lokasi'      => 'museum_huta_bolon, Samosir',
                'tanggal_foto'=> '2025-03-28',
                'status'      => true,
            ],
            [
                'judul'       => 'Sunset di Atas Danau Toba',
                'kategori'    => 'Landscape',
                'deskripsi'   => 'Momen golden hour yang memukau di atas permukaan Danau Toba dengan siluet pegunungan yang menakjubkan di latar belakang.',
                'gambar'      => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80',
                'lokasi'      => 'Danau Toba, Sumatera Utara',
                'tanggal_foto'=> '2025-05-01',
                'status'      => true,
            ],
            [
                'judul'       => 'Kuliner Arsik Ikan Mas Khas Batak',
                'kategori'    => 'Kuliner',
                'deskripsi'   => 'Sajian ikan arsik khas Batak Toba yang lezat dengan bumbu kunyit, asam kersik, dan andaliman yang menggugah selera.',
                'gambar'      => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=800&q=80',
                'lokasi'      => 'batu_pasa_pantai, Samosir',
                'tanggal_foto'=> '2025-02-14',
                'status'      => true,
            ],
            [
                'judul'       => 'Situs Batu Megalitik museum_huta_bolon',
                'kategori'    => 'Heritage',
                'deskripsi'   => 'Deretan kursi dan meja batu peninggalan Raja Laga Siallagan di museum_huta_bolon yang berusia ratusan tahun.',
                'gambar'      => 'https://images.unsplash.com/photo-1548013146-72479768bada?w=800&q=80',
                'lokasi'      => 'museum_huta_bolon, Samosir',
                'tanggal_foto'=> '2025-01-22',
                'status'      => true,
            ],
        ];

        foreach ($data as $item) {
            $item['admin_id']   = 1;
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('galeri')->insert($item);
        }

        $this->command->info('✅ GaleriSeeder: ' . count($data) . ' foto galeri berhasil ditambahkan.');
    }
}
