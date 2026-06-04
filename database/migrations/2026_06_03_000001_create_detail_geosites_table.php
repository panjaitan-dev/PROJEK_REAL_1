<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_geosites', function (Blueprint $table) {
            $table->id();
            $table->string('geosite')->unique(); // 'batu_hoda_beach', 'museum_huta_bolon', 'batu_pasa_pantai'
            $table->text('maps_url')->nullable();
            $table->string('jam_buka', 255)->nullable();
            $table->string('harga_tiket', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_geosites');
    }
};
