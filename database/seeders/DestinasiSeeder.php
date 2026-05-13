<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DestinasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('destinasis')->truncate();

        $destinasi = [
            // ─── KATEGORI ALAM ────────────────────────────────────────────
            [
                'nama'        => 'Goa Marlakkop',
                'lokasi'      => 'batu_pasa_pantai, Samosir',
                'deskripsi'   => 'Goa Marlakkop adalah goa batu alam yang tersembunyi di balik pepohonan tropis Pulau Samosir. Di dalamnya terdapat stalaktit dan stalagmit yang terbentuk selama ribuan tahun, dengan lorong-lorong alami yang menakjubkan. Goa ini menjadi salah satu fenomena geologi penting di Geosite Danau Toba dan menarik perhatian para peneliti serta wisatawan petualang.',
                'gambar_utama'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Goa_Belanda_Bandung.jpg/1280px-Goa_Belanda_Bandung.jpg',
                'tags'        => json_encode(['geologi', 'petualangan', 'alam']),
                'kategori'    => 'Alam',
                'status'      => true,
            ],
            [
                'nama'        => 'Air Terjun Situmurun',
                'lokasi'      => 'Lumban Julu, Toba',
                'deskripsi'   => 'Air Terjun Situmurun atau dikenal juga sebagai Air Terjun Binangalom adalah air terjun yang langsung jatuh ke perairan Danau Toba. Dengan ketinggian sekitar 50 meter, air terjun ini menjadi salah satu pemandangan paling dramatis di kawasan Geopark Kaldera Toba. Pengunjung dapat menikmati keindahannya dari perahu atau berenang di kolam alami di bawahnya.',
                'gambar_utama'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Sipiso-piso_waterfall.jpg/800px-Sipiso-piso_waterfall.jpg',
                'tags'        => json_encode(['air terjun', 'danau toba', 'alam']),
                'kategori'    => 'Alam',
                'status'      => true,
            ],
            [
                'nama'        => 'Batu Gantung',
                'lokasi'      => 'Parapat, Simalungun',
                'deskripsi'   => 'Batu Gantung adalah fenomena geologi unik berupa batu besar yang seolah-olah menggantung di tebing curam di tepi Danau Toba. Legenda setempat menceritakan batu ini sebagai jelmaan seorang gadis Batak. Dari kapal yang melintas di Danau Toba, Batu Gantung terlihat sangat dramatis dengan latar belakang tebing hijau dan air danau biru jernih.',
                'gambar_utama'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Lake_Toba_from_above.jpg/1280px-Lake_Toba_from_above.jpg',
                'tags'        => json_encode(['geologi', 'legenda', 'danau toba']),
                'kategori'    => 'Alam',
                'status'      => true,
            ],

            // ─── KATEGORI BUATAN ──────────────────────────────────────────
            [
                'nama'        => 'Patung Sigale-Gale',
                'lokasi'      => 'batu_pasa_pantai, Samosir',
                'deskripsi'   => 'Patung Sigale-Gale adalah patung kayu berukuran manusia yang dapat digerakkan dan digunakan dalam upacara adat Batak. Patung ini memiliki nilai budaya dan historis yang tinggi, dan menjadi daya tarik wisata utama di batu_pasa_pantai. Pertunjukan Sigale-Gale diselenggarakan setiap hari untuk para wisatawan, diiringi musik tradisional gondang Batak yang meriah.',
                'gambar_utama'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Sigale-gale_dance_Samosir.jpg/800px-Sigale-gale_dance_Samosir.jpg',
                'tags'        => json_encode(['budaya', 'tradisi', 'pertunjukan']),
                'kategori'    => 'Buatan',
                'status'      => true,
            ],
            [
                'nama'        => 'Menara Tele',
                'lokasi'      => 'Harian, Samosir',
                'deskripsi'   => 'Menara Tele adalah menara pandang yang dibangun di perbukitan dengan ketinggian sekitar 900 mdpl. Dari puncak menara, pengunjung dapat menikmati panorama Danau Toba 360 derajat yang memukau, termasuk Pulau Samosir yang terbentang luas. Menara ini juga dilengkapi area parkir yang luas, warung makan, dan toko souvenir khas Batak.',
                'gambar_utama'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Lake_Toba_Aerial.jpg/1280px-Lake_Toba_Aerial.jpg',
                'tags'        => json_encode(['menara pandang', 'panorama', 'foto']),
                'kategori'    => 'Buatan',
                'status'      => true,
            ],
            [
                'nama'        => 'Jembatan Tano Ponggol',
                'lokasi'      => 'Pangururan, Samosir',
                'deskripsi'   => 'Jembatan Tano Ponggol adalah jembatan yang menghubungkan Pulau Samosir dengan daratan Sumatera. Jembatan ini melintasi selat sempit yang memisahkan Samosir dari Sumatera, dan menjadi akses darat utama menuju pulau tersebut. Renovasi terbaru menjadikan jembatan ini ikon pariwisata yang instagramable dengan pemandangan Danau Toba yang indah di kedua sisinya.',
                'gambar_utama'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c7/Bridge_Lake_Toba.jpg/1280px-Bridge_Lake_Toba.jpg',
                'tags'        => json_encode(['jembatan', 'ikon', 'samosir']),
                'kategori'    => 'Buatan',
                'status'      => true,
            ],

            // ─── KATEGORI BUDAYA ──────────────────────────────────────────
            [
                'nama'        => 'Makam Raja Sidabutar',
                'lokasi'      => 'batu_pasa_pantai, Samosir',
                'deskripsi'   => 'Makam Raja Sidabutar adalah kompleks pemakaman raja-raja Batak yang berusia lebih dari 500 tahun di Desa batu_pasa_pantai. Makam ini terbuat dari batu monolit besar yang diukir dengan ornamen Batak yang indah. Di sekitar makam terdapat pohon-pohon besar yang berusia ratusan tahun, menciptakan suasana sakral dan penuh sejarah yang menjadi warisan budaya tak ternilai.',
                'gambar_utama'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/batu_pasa_pantai_king_sarcophagus.jpg/800px-batu_pasa_pantai_king_sarcophagus.jpg',
                'tags'        => json_encode(['sejarah', 'kerajaan', 'warisan budaya']),
                'kategori'    => 'Budaya',
                'status'      => true,
            ],
            [
                'nama'        => 'Museum Huta Bolon Simanindo',
                'lokasi'      => 'Simanindo, Samosir',
                'deskripsi'   => 'Museum Huta Bolon Simanindo adalah museum rumah adat Batak yang menyimpan koleksi benda-benda bersejarah dan artefak budaya Batak Toba. Di sini pengunjung dapat menyaksikan pertunjukan tari tradisional Tor-Tor dan musik gondang yang autentik setiap harinya. Arsitektur rumah adat Batak yang khas dengan ukiran gorga (ornamen Batak) menjadikan museum ini destinasi wajib.',
                'gambar_utama'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Batak_traditional_house.jpg/1280px-Batak_traditional_house.jpg',
                'tags'        => json_encode(['museum', 'tor-tor', 'adat batak']),
                'kategori'    => 'Budaya',
                'status'      => true,
            ],
            [
                'nama'        => 'Desa museum_huta_bolon',
                'lokasi'      => 'museum_huta_bolon, Samosir',
                'deskripsi'   => 'Desa museum_huta_bolon terkenal dengan kompleks batu megalitik peninggalan Raja Laga Siallagan yang berusia ratusan tahun. Di sini terdapat kursi batu, meja batu, dan tempat hukuman yang digunakan dalam sistem peradilan adat Batak kuno. Selain itu, desa ini juga merupakan pusat kerajinan tenun ulos yang masih dikerjakan secara tradisional oleh masyarakat setempat.',
                'gambar_utama'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/museum_huta_bolon_stone_chairs.jpg/1280px-museum_huta_bolon_stone_chairs.jpg',
                'tags'        => json_encode(['megalitik', 'ulos', 'budaya batak']),
                'kategori'    => 'Budaya',
                'status'      => true,
            ],
        ];

        foreach ($destinasi as $item) {
            $item['slug']       = Str::slug($item['nama']);
            $item['admin_id']   = 1;
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('destinasis')->insert($item);
        }

        $this->command->info('✅ DestinasiSeeder: ' . count($destinasi) . ' destinasi berhasil ditambahkan.');
    }
}
