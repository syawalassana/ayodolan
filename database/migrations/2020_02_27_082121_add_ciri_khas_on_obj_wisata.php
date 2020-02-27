<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCiriKhasOnObjWisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obj_wisata', function (Blueprint $table) {
            $table->string('ciri_khas');
            
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
            $table->dropColumn('ciri_khas');
        });
    }
}
