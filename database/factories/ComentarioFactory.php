<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modelos\Comentario;
use Faker\Generator as Faker;

$factory->define(Comentario::class, function (Faker $faker) {
    return [
        'titulo'=>$faker -> word,
        'contenido'=>$faker -> word,
        'persona_id'=>App\Modelos\User::all()->random()->id,
        'producto_id'=>App\Modelos\Producto::all()->random()->id
    ];
});
