<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('destinasis', function (Blueprint $table) {
            $table->boolean('tampil_di_home')->default(false)->after('status');
            $table->unsignedTinyInteger('urutan_home')->default(0)->after('tampil_di_home');
        });
    }

    public function down(): void
    {
        Schema::table('destinasis', function (Blueprint $table) {
            $table->dropColumn(['tampil_di_home', 'urutan_home']);
        });
    }
};
