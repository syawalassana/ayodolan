<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('obj_wisata_id');
            $table->foreign('obj_wisata_id')->references('id')->on('obj_wisata');
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
        Schema::dropIfExists('paket_detail');
    }
}
