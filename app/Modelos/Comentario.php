<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table='comentarios';

    public function persona (){
    return $this -> belongsTo('App\Modelos\Persona','persona_id','id');
    
    }
    public function producto (){
    return $this -> belongsTo('App\Modelos\Producto','producto_id','id');
    
    }
    //
}
