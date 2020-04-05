<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    return [
        'nama_barang' => $faker->colorName,
        'jumlah_barang' => $faker->numberBetween($min = 1, $max = 90)
    ];
});
