<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReplaceLamaKunjunganOnFieldPaketDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paket_detail', function (Blueprint $table) {
            $table->dropColumn('lama_kunjungan');
            $table->time('start');
            $table->time('end');
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
            $table->dropColumn('start');
        });
    }
}
