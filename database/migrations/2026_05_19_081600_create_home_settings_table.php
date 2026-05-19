<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key', 100)->unique();
            $table->longText('value')->nullable();
            $table->timestamps();
        });

        // Seed default values
        $defaults = [
            'hero_subtitle'      => 'Global Geopark',
            'hero_title'         => 'Simanindo - Batu Hoda',
            'stat_geosites'      => '16',
            'stat_geosites_label'=> 'GEOSITES',
            'stat_sejarah'       => '74.000',
            'stat_sejarah_label' => 'TAHUN SEJARAH',
            'stat_warisan'       => '15+',
            'stat_warisan_label' => 'WARISAN BUDAYA',
            'stat_umkm'          => '100+',
            'stat_umkm_label'    => 'UMKM LOKAL',
            'warisan_judul'      => 'Warisan Geologi Kelas Dunia',
            'warisan_paragraf_1' => 'Danau Toba, terbentuk dari letusan supervolcano 74.000 tahun lalu, adalah danau vulkanik terbesar di dunia. Diakui UNESCO sebagai Global Geopark pada tahun 2020.',
            'warisan_paragraf_2' => 'Kawasan Simanindo - Batu Hoda menyimpan pesona pantai eksotis, museum budaya Batak, serta formasi batu unik yang menjadi ikon geopark Danau Toba.',
            'warisan_gambar'     => '',
            'destinasi_judul'    => 'Destinasi Unggulan',
            'destinasi_subjudul' => 'Wisata eksotis di kawasan Simanindo - Batu Hoda, Pulau Samosir',
            'cta_judul'          => 'Mulai Petualangan Anda',
            'cta_deskripsi'      => 'Temukan keindahan Pantai Batu Hoda, belajar budaya Batak di Museum Huta Bolon, dan abadikan momen di Batu Pasa Pantai.',
        ];

        foreach ($defaults as $key => $value) {
            \DB::table('home_settings')->insert([
                'key'        => $key,
                'value'      => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};
