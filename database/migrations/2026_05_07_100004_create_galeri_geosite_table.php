<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeri_geosite', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->string('kategori', 100); // pantai1, pantai2, pantai3, dll
            $table->longText('gambar')->nullable();
            $table->string('geosite', 50); // ambarita, tuktuk, tomok
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreignId('admin_id')->nullable() ->default(1) ->constrained('admin');
            $table->index('geosite');
            $table->index('kategori');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeri_geosite');
    }
};
