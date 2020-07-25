<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curso;
use App\Docente;
use Faker\Generator as Faker;


$factory->define(Curso::class, function (Faker $faker) {
    return [
        //
        'name' => Str::random(50),
        'image'=> base64_encode(file_get_contents(base_path().'/public/images/curso.jpg')),
        'price' => $faker->numberBetween(200,200),
        'docente_id'=> Docente::all()->random()->id,
        'description'=> Str::random(50),
        
    ];
});
