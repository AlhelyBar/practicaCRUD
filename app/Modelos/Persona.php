<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Persona extends Model
{
    /**
    *@var string
    */
    protected $table ='personas';

    public function comentarios (){
        return $this -> hasMany('App\Modelos\Comentario','persona_id','id');
    }
    
    use HasApiTokens;
}
