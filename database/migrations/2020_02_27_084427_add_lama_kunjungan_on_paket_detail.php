<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLamaKunjunganOnPaketDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paket_detail', function (Blueprint $table) {
            $table->Integer('lama_kunjungan');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paket_detail', function (Blueprint $table) {
            $table->dropColumn('lama_kunjungan');
        });
    }
}
