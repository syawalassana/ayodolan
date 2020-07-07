<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PaketDetail;
use Faker\Generator as Faker;

$factory->define(PaketDetail::class, function (Faker $faker) {
    return [
        'obj_wisata_id' => $faker->numberBetween(1,50),
        'paket_id' => function(){
            return factory(App\Paket::class)->create()->id;
        },
        'start' => '10:00',
        'end' => '11:00'
    ];
});
