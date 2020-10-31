<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Comentario;

class ComentariosController extends Controller
{
    public function index($id=null){
        if($id)
            return response()->json(["comentario"=>Comentario::find($id)],200);
        return response()->json(["comentarios"=>Comentario::all()],200);
    }

    public function guardar(Request $request){
        $comentario = new Comentario();
        $comentario->titulo=$request->titulo;
        $comentario->contenido=$request->contenido;

        if($comentario -> save())
            return response()->json(["comentario"=>$comentario],201);

        return response()->json(null,400);
    }

    
    public function borrar( $id){
        $comentario=Comentario::find($id);
        $comentario->delete();
        
        return response()->json(null, 204);

    }

    public function actualizar(Request $request, $id){
        $comentario=Persona::find($id);
        $comentario->titulo=$request->titulo;
        $comentario->contenido=$request->contenido;

        if($comentario -> save())
            return response()->json(["comentario"=>$comentario],201);

        return response()->json(null,400);
    }
}
