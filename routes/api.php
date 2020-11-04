<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Personas
Route::middleware('auth:sanctum')->get('/user',"API\PersonaController@index");
Route::post("/logAdmin","API\PersonaController@logAdmin");
Route::post("/logIn","API\PersonaController@logIn");
Route::post("/guardar","API\PersonaController@guardar");

Route::middleware('auth:sanctum')->delete("/borrar","API\PersonaController@borrar");

Route::put("user/{id}", "API\PersonaController@actualizar")->where("id","[0-9]+");

//Comentarios
Route::get("comentarios/{id?}","API\ComentariosController@index")->where("id","[0-9]+");
Route::post("comentarios","API\ComentariosController@guardar");
Route::delete("comentarios/{id}","API\ComentariosController@borrar")->where("id","[0-9]+");
Route::put("comentarios/{id}", "API\ComentariosController@actualizar")->where("id","[0-9]+");

//Productos
Route::get("productos/{id?}","API\ProductosController@index")->where("id","[0-9]+");
Route::post("productos","API\ProductosController@guardar");
Route::delete("productos/{id}","API\ProductosController@borrar")->middleware('verificar.color');
Route::put("productos/{id}", "API\ProductosController@actualizar")->where("id","[0-9]+");

//Consultas
Route::get("consulta/{id?}","API\ConsultaController@comentario_per")->where("id","[0-9]+");
