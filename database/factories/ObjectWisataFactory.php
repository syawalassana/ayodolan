<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ObjekWisata;
use Faker\Generator as Faker;

$factory->define(ObjekWisata::class, function (Faker $faker) {
    return [
        'nama_wisata' => $faker->name,
        'lokasi' => $faker->address,
        'harga' => 10000,
        'gambar' => '',
        'deskripsi' => $faker->text(200),
        'ciri_khas' => $faker->word,
    ];
});
