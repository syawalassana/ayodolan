<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_paket');
            $table->text('deskripsi');
            $table->integer('harga');
            $table->string('gambar_paket');
            $table->unsignedBigInteger('mobil_id');
            $table->foreign('mobil_id')->references('id')->on('mobil');
            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotel');
            $table->string('lama_liburan');
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
        Schema::dropIfExists('paket');
    }
}
