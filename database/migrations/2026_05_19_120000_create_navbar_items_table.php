<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('navbar_items', function (Blueprint $table) {
            $table->id();
            $table->string('geosite')->index();
            $table->string('label');
            $table->string('href');
            $table->integer('urutan')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('navbar_items');
    }
};
