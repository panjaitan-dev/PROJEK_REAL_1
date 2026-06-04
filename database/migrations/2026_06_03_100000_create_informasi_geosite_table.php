<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informasi_geosite', function (Blueprint $table) {
            $table->id();
            $table->string('geosite');          // batu_hoda_beach, museum_huta_bolon, batu_pasa_pantai
            $table->string('judul');             // Judul card, misal "Sejarah Batu Hoda"
            $table->longText('konten');          // Isi konten (HTML)
            $table->string('gambar')->nullable(); // Path gambar
            $table->integer('urutan')->default(1); // Urutan tampil
            $table->boolean('status')->default(true); // Aktif/tidak
            $table->timestamps();

            $table->index('geosite');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informasi_geosite');
    }
};
