<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Producto;

class ProductosController extends Controller
{
    public function index($id=null){
        if($id)
            return response()->json(["producto"=>Producto::find($id)],200);
        return response()->json(["productos"=>Producto::all()],200);
    }

    public function guardar(Request $request){
        $producto = new Producto();
        $producto->nombreProducto=$request->nombreProducto;
        $producto->descripcion=$request->descripcion;

        if($producto -> save())
            return response()->json(["producto"=>$producto],201);

        return response()->json(null,400);
    }

    public function borrar(Request $request,$id){
        $producto=Producto::find($id);
        $producto->delete();
        
        return response()->json(null, 204);

    }

    public function actualizar(Request $request, $id){
        $producto=Producto::find($id);
        $producto->nombreProducto=$request->nombreProducto;
        $producto->descripcion=$request->descripcion;

        if($producto -> save())
            return response()->json(["producto"=>$producto],201);

        return response()->json(null,400);
    }
}
