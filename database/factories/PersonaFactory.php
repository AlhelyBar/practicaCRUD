<?php


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modelos\Persona;
use Faker\Generator as Faker;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->firstName, 
        'usuario'=>$faker->email,
        'contraseña'=>$faker->word
        

        //
    ];
});
