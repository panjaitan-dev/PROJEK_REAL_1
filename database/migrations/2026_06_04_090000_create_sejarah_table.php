<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sejarah', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->string('slug', 255)->unique();
            $table->longText('konten');
            $table->string('gambar')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->index('urutan');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sejarah');
    }
};
