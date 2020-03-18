<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGambarWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_wisata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('obj_wisata_id');
            $table->foreign('obj_wisata_id')->references('id')->on('obj_wisata');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gambar_wisata');
    }
}
