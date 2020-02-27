<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipeWisataOnObjWisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obj_wisata', function (Blueprint $table) {
            $table->string('tipe_wisata')->default("Pantai");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obj_wisata', function (Blueprint $table) {
            $table->dropColumn('tipe_wisata');
            
        });
    }
}
