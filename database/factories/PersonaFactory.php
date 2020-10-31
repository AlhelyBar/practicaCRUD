<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modelos\Persona;
use Faker\Generator as Faker;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->firstName, 
        'apellido_p'=>$faker->lastName,
        'apellido_m'=>$faker->lastName
        

        //
    ];
});
