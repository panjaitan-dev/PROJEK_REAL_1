<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InformasiGeosite;

class InformasiGeositeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ==================== BATU HODA BEACH ====================
            [
                'geosite' => 'batu_hoda_beach',
                'judul'   => '📜 Sejarah Batu Hoda',
                'konten'  => 'Batu Hoda merupakan sebuah kawasan yang namanya berasal dari gabungan kata "batu" dan "hoda" (kuda) dalam bahasa Batak. Kawasan ini berada di wilayah Tugu 0 KM Pulau Samosir, yang dikenal sebagai titik pusat dan arah penting dalam peta budaya dan wisata Danau Toba.

Dahulu, wilayah ini merupakan bagian dari kehidupan masyarakat Batak Toba yang hidup berdampingan dengan alam. Mereka memanfaatkan tanah untuk pertanian, dan perairan Danau Toba untuk kehidupan sehari-hari. Seiring waktu, kawasan ini berkembang menjadi salah satu destinasi wisata yang dikenal karena keindahan alam dan nilai budayanya.',
                'urutan'  => 1,
                'status'  => true,
            ],
            [
                'geosite' => 'batu_hoda_beach',
                'judul'   => '🐎 Legenda Batu Hoda',
                'konten'  => 'Menurut cerita yang berkembang di masyarakat, dahulu terdapat sepasang kuda yang hidup di kawasan Batu Hoda. Keduanya hidup berdampingan dengan penuh kasih, dan memiliki harapan untuk membangun kehidupan serta keturunan bersama.

Namun suatu hari, salah satu kuda pergi meninggalkan pasangannya tanpa kembali. Kuda yang ditinggalkan tetap setia menunggu di tempat itu. Hari berganti hari, bulan berganti bulan, bahkan tahun berganti tahun, namun ia tetap menunggu dengan penuh harapan.

Kesetiaan dan penantian yang begitu lama membuat kuda tersebut akhirnya berubah menjadi batu. Dari peristiwa inilah masyarakat percaya bahwa terbentuknya "Batu Hoda" merupakan simbol dari kuda yang setia menunggu hingga menjadi batu.',
                'urutan'  => 2,
                'status'  => true,
            ],

            // ==================== MUSEUM HUTA BOLON ====================
            [
                'geosite' => 'museum_huta_bolon',
                'judul'   => 'Sejarah Museum Huta Bolon',
                'konten'  => 'Museum Huta Bolon merupakan desa tua yang terkenal sebagai pusat pemerintahan Raja Siallagan pada masa lalu. Desa ini dikenal karena adanya kursi batu dan meja persidangan batu yang digunakan sebagai tempat pengadilan adat masyarakat Batak Toba.',
                'urutan'  => 1,
                'status'  => true,
            ],
            [
                'geosite' => 'museum_huta_bolon',
                'judul'   => 'Budaya Museum Huta Bolon',
                'konten'  => 'Budaya di Museum Huta Bolon masih sangat kental dengan tradisi Batak Toba. Rumah adat tradisional, tarian tortor, dan penggunaan ulos masih dijaga oleh masyarakat setempat. Cerita rakyat dan sejarah kerajaan Batak juga diwariskan secara turun-temurun.',
                'urutan'  => 2,
                'status'  => true,
            ],
            [
                'geosite' => 'museum_huta_bolon',
                'judul'   => 'Daya Tarik Wisata Museum Huta Bolon',
                'konten'  => 'Museum Huta Bolon terkenal dengan situs Batu Persidangan Raja Siallagan yang menjadi daya tarik utama wisatawan. Selain melihat peninggalan sejarah, pengunjung juga dapat menikmati suasana desa tradisional Batak dan menyaksikan pertunjukan budaya khas Batak Toba.',
                'urutan'  => 3,
                'status'  => true,
            ],

            // ==================== BATU PASA PANTAI ====================
            [
                'geosite' => 'batu_pasa_pantai',
                'judul'   => 'Sejarah Pantai Batu Pasa',
                'konten'  => 'Pantai Batu Pasa merupakan salah satu destinasi wisata di kawasan Simanindo, Pulau Samosir, yang dikenal dengan keindahan alam Danau Toba serta batu-batu alami di sekitar pantai. Tempat ini menjadi salah satu lokasi wisata yang sering dikunjungi wisatawan untuk menikmati suasana tenang dan panorama alam khas Danau Toba.',
                'urutan'  => 1,
                'status'  => true,
            ],
            [
                'geosite' => 'batu_pasa_pantai',
                'judul'   => 'Budaya Pantai Batu Pasa',
                'konten'  => 'Masyarakat di sekitar Batu Pasa masih mempertahankan budaya Batak Toba yang diwariskan secara turun-temurun. Tradisi adat, penggunaan kain ulos, musik tradisional, dan keramahan masyarakat menjadi bagian dari kehidupan sehari-hari yang dapat dirasakan langsung oleh wisatawan.',
                'urutan'  => 2,
                'status'  => true,
            ],
            [
                'geosite' => 'batu_pasa_pantai',
                'judul'   => 'Daya Tarik Wisata Pantai Batu Pasa',
                'konten'  => 'Pantai Batu Pasa menawarkan pemandangan Danau Toba yang indah dengan suasana yang sejuk dan nyaman. Wisatawan dapat menikmati panorama alam, bersantai di tepi pantai, berfoto dengan latar batu-batu alami, serta menikmati suasana khas wisata Pulau Samosir yang masih alami dan asri.',
                'urutan'  => 3,
                'status'  => true,
            ],
        ];

        foreach ($data as $item) {
            InformasiGeosite::create($item);
        }
    }
}
