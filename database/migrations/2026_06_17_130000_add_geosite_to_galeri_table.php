<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('galeri', function (Blueprint $table) {
            $table->string('geosite', 50)->nullable()->after('galeri_geosite_id');
            $table->index('geosite');
        });

        // Copy existing geosite values from galeri_geosite to galeri
        if (Schema::hasTable('galeri_geosite')) {
            $geositePics = DB::table('galeri_geosite')->get();
            foreach ($geositePics as $pic) {
                DB::table('galeri')
                    ->where('galeri_geosite_id', $pic->id)
                    ->update(['geosite' => $pic->geosite]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galeri', function (Blueprint $table) {
            $table->dropIndex(['geosite']);
            $table->dropColumn('geosite');
        });
    }
};
