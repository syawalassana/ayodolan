<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paket;
use Faker\Generator as Faker;

$factory->define(Paket::class, function (Faker $faker) {
    return [
        'nama_paket' => 'Paket '.$faker->lastName,
        'deskripsi' => $faker->text(),
        'harga' => 80000,
        'gambar_paket' => '',
        'mobil_id' => $faker->numberBetween(1,50),
        'hotel_id' => $faker->numberBetween(1,50),
        'lama_liburan' => 2,
        'harga_supir' => 100000,
        'harga_tour_guide' => 100000,
    ];
});
