<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'nama_event' => $faker->name,
        'tgl_event' => $faker->dateTimeThisYear(),
        'tgl_mulai' => Carbon::now(),
        'tgl_selesai' => Carbon::now()->addMonths(3),
        'lokasi' => $faker->address,
        'gambar_event' => '',
        'deskripsi_event' => $faker->text()
    ];
});
