<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinasis', function (Blueprint $table) {

            $table->id();
            $table->string('nama', 255);
            $table->string('slug')->unique();
            $table->string('lokasi', 100);
            $table->text('deskripsi');
            $table->longText('gambar_utama')->nullable();
            $table->json('tags')->nullable();
            $table->string('kategori', 100);
            $table->string('jam_buka')->nullable();
            $table->string('harga_tiket')->nullable();
            $table->json('fasilitas')->nullable();
            $table->json('umkm_terdekat')->nullable();
            $table->text('informasi_tambahan')->nullable();
            $table->longText('maps')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreignId('admin_id')
                ->nullable()
                ->default(1)
                ->constrained('admin');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinasis');
    }
};