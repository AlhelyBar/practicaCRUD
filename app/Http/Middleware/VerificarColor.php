<?php

namespace App\Http\Middleware;

use Closure;
use App\Modelos\Producto;
use Log;
class VerificarColor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $producto=Producto::find($request->id);
        if($producto){
            if($producto->nombreProducto!=$request->nombreProducto)
                return abort(400);
            return $next($request);
        }
        return abort(400);

      
            
        
        
       
        /*
        if($request->nombreProducto=="Aqua")
            return response()->json(["producto"=>$producto],201);

        return response()->json(null,400);
        return $next($request);*/
    }
}
