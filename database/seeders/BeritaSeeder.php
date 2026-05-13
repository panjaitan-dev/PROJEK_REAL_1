<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('berita')->truncate();

        $data = [
            [
                'judul'   => 'Geosite Danau Toba Resmi Diakui sebagai UNESCO Global Geopark',
                'slug'    => 'geosite-danau-toba-diakui-unesco-global-geopark',
                'konten'  => '<p>Kawasan Kaldera Toba secara resmi diakui sebagai UNESCO Global Geopark pada tahun 2020, menjadikannya salah satu dari 169 geopark yang tersebar di 44 negara di seluruh dunia. Pengakuan ini merupakan buah dari kerja keras pemerintah daerah, masyarakat lokal, dan para pemangku kepentingan yang telah berjuang selama bertahun-tahun.</p><p>Kaldera Toba terbentuk akibat letusan supervulkan sekitar 74.000 tahun yang lalu, yang merupakan salah satu letusan terbesar dalam sejarah geologi bumi. Letusan dahsyat ini menghasilkan kaldera seluas 100 km x 30 km yang kemudian terisi air membentuk Danau Toba yang kita kenal hari ini.</p><p>Dengan status UNESCO Global Geopark, kawasan ini kini mendapat perhatian internasional yang lebih besar, membuka peluang pengembangan geowisata, edukasi geologi, dan pelestarian budaya Batak yang lebih komprehensif. Masyarakat lokal diharapkan menjadi garda terdepan dalam menjaga keberlangsungan geopark ini.</p>',
                'gambar'  => 'https://images.unsplash.com/photo-1569949381669-ecf31ae8e613?w=800&q=80',
                'penulis' => 'Tim Redaksi Geosite Toba',
                'views'   => 1250,
                'status'  => true,
            ],
            [
                'judul'   => 'Festival Danau Toba 2025: Perayaan Budaya Batak yang Meriah',
                'slug'    => 'festival-danau-toba-2025-perayaan-budaya-batak',
                'konten'  => '<p>Festival Danau Toba 2025 kembali digelar dengan kemeriahan yang luar biasa. Ribuan wisatawan dari seluruh Indonesia dan mancanegara memadati kawasan Danau Toba untuk menyaksikan pertunjukan seni dan budaya Batak yang spektakuler.</p><p>Acara unggulan festival tahun ini meliputi pertunjukan Tor-Tor massal yang diikuti oleh lebih dari 1.000 penari dari berbagai marga Batak, lomba gondang sabangunan, pameran ulos terbesar, dan kompetisi memasak kuliner tradisional Batak. Festival ini juga menampilkan pameran produk UMKM lokal dari seluruh kawasan Samosir.</p><p>Bupati Samosir dalam sambutannya menyatakan bahwa Festival Danau Toba bukan sekadar ajang pariwisata, tetapi merupakan wujud nyata komitmen masyarakat Batak dalam melestarikan warisan budaya leluhur untuk generasi mendatang.</p>',
                'gambar'  => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=800&q=80',
                'penulis' => 'Redaksi Wisata Samosir',
                'views'   => 876,
                'status'  => true,
            ],
            [
                'judul'   => 'Pengembangan Infrastruktur Wisata Samosir Terus Dipercepat',
                'slug'    => 'pengembangan-infrastruktur-wisata-samosir-dipercepat',
                'konten'  => '<p>Pemerintah Kabupaten Samosir terus mempercepat pembangunan infrastruktur penunjang pariwisata di kawasan Danau Toba. Sejumlah proyek strategis tengah berjalan, mulai dari pelebaran jalan lingkar Samosir, renovasi dermaga perahu di batu_pasa_pantai dan batu_hoda_beach, hingga pembangunan pusat informasi wisata terpadu di museum_huta_bolon.</p><p>Kepala Dinas Pariwisata Samosir menyebutkan bahwa anggaran sebesar Rp 45 miliar telah dialokasikan untuk pengembangan infrastruktur wisata tahun 2025. Prioritas utama adalah peningkatan akses jalan menuju objek wisata unggulan, pembangunan toilet umum berstandar, dan pemasangan jaringan WiFi publik di titik-titik wisata strategis.</p><p>Masyarakat setempat menyambut baik program ini dan berharap pembangunan infrastruktur dapat meningkatkan kunjungan wisatawan sekaligus membuka lapangan kerja baru bagi warga Samosir.</p>',
                'gambar'  => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80',
                'penulis' => 'Tim Liputan Toba',
                'views'   => 543,
                'status'  => true,
            ],
            [
                'judul'   => 'Tradisi Ulos Batak: Warisan Leluhur yang Terus Dilestarikan',
                'slug'    => 'tradisi-ulos-batak-warisan-leluhur-dilestarikan',
                'konten'  => '<p>Ulos merupakan kain tenun tradisional suku Batak yang memiliki makna filosofis mendalam dalam kehidupan masyarakat Batak Toba. Setiap motif ulos memiliki makna tersendiri dan digunakan dalam berbagai upacara adat, mulai dari kelahiran, pernikahan, hingga kematian.</p><p>Di Desa museum_huta_bolon, sejumlah pengrajin ulos masih mempertahankan cara menenun tradisional menggunakan alat tenun bukan mesin (ATBM). Proses pembuatan satu lembar ulos bisa memakan waktu beberapa minggu hingga berbulan-bulan, tergantung kerumitan motifnya.</p><p>Pemerintah daerah kini aktif mendukung pelestarian tradisi ulos melalui pelatihan menenun bagi generasi muda, sertifikasi produk ulos asli Samosir, dan pembukaan pasar ekspor ke mancanegara. Ulos Batak telah mendapat pengakuan sebagai Warisan Budaya Tak Benda dari Kemendikbud RI.</p>',
                'gambar'  => 'https://images.unsplash.com/photo-1558769132-cb1aea458c5e?w=800&q=80',
                'penulis' => 'Redaksi Budaya Batak',
                'views'   => 1102,
                'status'  => true,
            ],
            [
                'judul'   => 'Kuliner Khas Batak Toba: Cita Rasa yang Menggugah Selera',
                'slug'    => 'kuliner-khas-batak-toba-cita-rasa-menggugah-selera',
                'konten'  => '<p>Wisata kuliner menjadi salah satu daya tarik tersendiri bagi pengunjung Danau Toba. Masakan Batak Toba terkenal dengan penggunaan rempah-rempah yang kuat dan teknik memasak yang unik, menghasilkan cita rasa yang autentik dan tak tertandingi.</p><p>Beberapa kuliner wajib coba saat berkunjung ke kawasan Geosite Danau Toba antara lain: Arsik (ikan mas bumbu kunyit dan asam kersik), Naniura (ikan mentah yang diasamkan dengan asam batak), Saksang (daging dengan bumbu darah), Natinombur (ikan bakar bumbu khas Batak), dan Lapet (kue beras ketan isi parutan kelapa).</p><p>Berbagai warung makan dan restoran di kawasan batu_pasa_pantai, batu_hoda_beach, dan museum_huta_bolon menyajikan hidangan-hidangan autentik ini dengan harga yang terjangkau. Wisatawan juga dapat mengikuti kelas memasak Batak untuk belajar langsung dari juru masak lokal yang berpengalaman.</p>',
                'gambar'  => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=800&q=80',
                'penulis' => 'Tim Redaksi Kuliner',
                'views'   => 789,
                'status'  => true,
            ],
            [
                'judul'   => 'Tari Tor-Tor: Keindahan Gerak dalam Ritual Adat Batak',
                'slug'    => 'tari-tor-tor-keindahan-gerak-ritual-adat-batak',
                'konten'  => '<p>Tari Tor-Tor adalah tarian sakral tradisional Batak yang biasanya ditampilkan dalam upacara adat, pesta pernikahan, dan ritual keagamaan. Tarian ini diiringi oleh musik gondang sabangunan yang terdiri dari berbagai instrumen perkusi dan alat tiup tradisional Batak.</p><p>Gerakan Tor-Tor yang anggun dan penuh makna symbolik mencerminkan nilai-nilai kehidupan masyarakat Batak seperti kebersamaan, rasa syukur, dan penghormatan kepada leluhur. Setiap gerakan tangan, kaki, dan tubuh memiliki makna filosofis yang dalam dan diwarisi turun-temurun.</p><p>Di kawasan wisata batu_hoda_beach dan Museum Huta Bolon Simanindo, pertunjukan Tor-Tor dapat disaksikan setiap hari oleh wisatawan. Pemerintah dan komunitas adat terus berupaya meregenerasi penari dan pemusik muda agar tradisi ini tetap lestari untuk generasi berikutnya.</p>',
                'gambar'  => 'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=800&q=80',
                'penulis' => 'Redaksi Seni Budaya',
                'views'   => 634,
                'status'  => true,
            ],
        ];

        foreach ($data as $item) {
            $item['admin_id']   = 1;
            $item['created_at'] = now();
            $item['updated_at'] = now();
            DB::table('berita')->insert($item);
        }

        $this->command->info('✅ BeritaSeeder: ' . count($data) . ' berita berhasil ditambahkan.');
    }
}
