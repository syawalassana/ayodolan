<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obj_wisata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_wisata');
            $table->string('lokasi');
            $table->integer('harga');
            $table->string('gambar');
            $table->text('deskripsi');
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
      //  Schema::dropIfExists('obj_wisata');

        Schema::table('obj_wisata', function (Blueprint $table){
        $table->dropColumn('deskripsi');
        });
}
}
