<?php

namespace Database\Seeders;

use App\Models\Sejarah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SejarahSeeder extends Seeder
{
    public function run(): void
    {
        Sejarah::truncate();

        $items = [
            [
                'judul' => 'Letusan Supervolcano Toba',
                'konten' => '<p>Danau Toba terbentuk akibat letusan gunung berapi super (supervolcano) yang terjadi sekitar 74.000 tahun lalu. Letusan ini merupakan salah satu letusan terbesar dalam sejarah bumi yang meninggalkan kaldera raksasa yang kini dikenal sebagai Danau Toba.</p>',
                'gambar' => 'kaldera.jpg',
                'urutan' => 1,
                'status' => 1,
            ],
            [
                'judul' => 'Kaldera Toba',
                'konten' => '<p>Letusan supervolcano Toba menghasilkan kaldera dengan panjang 100 km dan lebar 30 km. Setelah letusan, kaldera perlahan terisi air dan membentuk Danau Toba yang kita kenal sekarang.</p>',
                'gambar' => 'letusan.png',
                'urutan' => 2,
                'status' => 1,
            ],
            [
                'judul' => 'UNESCO Global Geopark',
                'konten' => '<p>Kawasan Danau Toba kini diakui UNESCO sebagai Global Geopark pada tahun 2020. Pengakuan ini diberikan karena nilai geologi yang luar biasa, keanekaragaman hayati, serta warisan budaya Batak yang masih terjaga hingga saat ini.</p>',
                'gambar' => 'kaldera.jpg',
                'urutan' => 3,
                'status' => 1,
            ],
        ];

        foreach ($items as $item) {
            Sejarah::create(array_merge($item, [
                'slug' => Str::slug($item['judul']),
            ]));
        }
    }
}
