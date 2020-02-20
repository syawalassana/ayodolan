<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTanggalLiburanDiTransaksiTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dateTime('tanggal_liburan');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('tanggal_liburan');
            
        });
    }
}
