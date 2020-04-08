<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Siswa;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
    return [
        'nis' => $faker->numberBetween(11700000, 11900000),
        // 'nisn' => $faker->numberBetween(999999999, 1999999999),
        'nama' => $faker->name(),
        'jenis_kelamin' => $faker->randomElement(['L', 'P']),
        'orangtua_id' => '3',
        'rombel_id' => $faker->numberBetween(1, 28),
        'rayon_id' => $faker->numberBetween(1, 5)
    ];
});
