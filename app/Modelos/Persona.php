<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /**
    *@var string
    */
    protected $table ='personas';

    public function comentarios (){
        return $this -> hasMany('App\Modelos\Comentario','persona_id','id');
    }
    
    
}
