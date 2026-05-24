<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galeri', function (Blueprint $table) {
            // Kolom penghubung: jika tidak null, berarti entry ini berasal dari galeri_geosite
            $table->unsignedBigInteger('galeri_geosite_id')->nullable()->after('admin_id');
            $table->string('lokasi', 255)->nullable()->change(); // pastikan kolom lokasi ada
            $table->index('galeri_geosite_id');
        });
    }

    public function down(): void
    {
        Schema::table('galeri', function (Blueprint $table) {
            $table->dropIndex(['galeri_geosite_id']);
            $table->dropColumn('galeri_geosite_id');
        });
    }
};
