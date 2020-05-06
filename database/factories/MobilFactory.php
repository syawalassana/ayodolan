<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mobil;
use Faker\Generator as Faker;

$factory->define(Mobil::class, function (Faker $faker) {
    return [
        'nama_mobil' => $faker->company,
        'kapasitas' => 6,
        'harga_sewa' => 1000000,
        'foto_mobil' => '',
    ];
});
