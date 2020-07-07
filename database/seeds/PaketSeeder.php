<?php

use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Paket',10)->create()->each(function($c){
            $c->paketDetail()->saveMany(
                factory('App\PaketDetail',5)->make(['paket_id'=>NULL])
            );
        });
    }
}
