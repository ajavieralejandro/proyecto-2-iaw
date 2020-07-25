<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Docente;
use Faker\Generator as Faker;

$factory->define(Docente::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'profesion'=> Str::random(100),
        'bio'=>Str::random(10)
    ];
});
