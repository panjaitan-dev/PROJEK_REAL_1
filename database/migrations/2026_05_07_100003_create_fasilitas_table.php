<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->text('deskripsi');
            $table->longText('gambar')->nullable();
            $table->string('harga', 100)->nullable();
            $table->string('geosite', 50); // ambarita, tuktuk, tomok
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreignId('admin_id')->nullable() ->default(1) ->constrained('admin');
            $table->index('geosite');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};
