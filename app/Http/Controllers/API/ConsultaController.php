<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Modelos\Producto;
use App\Modelos\Persona;
use App\Modelos\Comentario;
use DB;

class ConsultaController extends Controller
{
   
    public function comentario_per($id){
        $comment = Comentarios::where('persona_id', $id)->get();
        return response()->json($comment);  
}


}
         
    
    /*
     public function index($id=null){
        if($id)
            $consulta = DB::table('personas')
                ->join('comentarios','personas.id','=','comentarios.persona_id')
                ->join('productos','productos.id','=','comentarios.producto_id')
                ->select('personas.nombre','productos.nombreProducto','comentarios.contenido')
                ->get($consulta);
    }
    $beneficiarios = DB::table('departamento')
                ->join('municipio', function($join) {
                    $join->on('departamento.id', '=', 'municipio.departamento_id')
                    ->where('departamento.id', '=', Input::get('depto'));
                })
                ->join('corregimiento', 'municipio.id', '=', 'corregimiento.municipio_id')
                ->join('barrio', 'corregimiento.id', '=', 'barrio.corregimiento_id')
                ->join('beneficiario', 'barrio.id', '=', 'beneficiario.barrio_id')
                ->get();
                
                return response()->json(["persona"=>Persona::find($id)],200);
            return response()->json(["comentario"=>Comentario::find($id)],200);
                
                */
    

