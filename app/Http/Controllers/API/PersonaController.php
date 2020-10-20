<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Persona;

class PersonaController extends Controller
{
    public function index($id=null){
        if($id)
            return response()->json(["persona"=>Persona::find($id)],200);
        return response()->json(["personas"=>Persona::all()],200);
    }

    public function guardar(Request $request){
        $persona = new Persona();
        $persona->nombre=$request->nombre;
        $persona->apellido_p=$request->apellido_p;
        $persona->apellido_m=$request->apellido_m;

        if($persona -> save())
            return response()->json(["persona"=>$persona],201);

        return response()->json(null,400);
    }
}
