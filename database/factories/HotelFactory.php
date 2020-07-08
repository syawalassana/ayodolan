<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'nama_hotel' => $faker->name,
        'alamat' => $faker->address,
        'harga' => 150000,
        'foto_hotel' => '',
        'gmap' => '',
        'no_telepon' => $faker->phoneNumber
    ];
});
