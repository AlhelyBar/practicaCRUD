<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\User;
use App\Modelos\Persona;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class PersonaController extends Controller
{
    //Muestra informacion segun tus Permisos
    public function index(Request $request){
        if($request->user()->tokenCan('admin:admin'))
            return response()->json(["users"=>User::all()],200);

        if($request->user()->tokenCan('user:info'))
            return response()->json(["perfil"=>$request->user()],200);

        return abort(401, "Scope invalido");
    }

    //Logueo de usuarios
    public function logIn(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email|password' => ['Credenciales incorrectas...'],
            ]);
        }

        $token = $user->createToken($request->email, ['user:info'])->plainTextToken;
        return response()->json(["token" => $token], 201);
    }

    //crear usuario Admin (esto no se hace)
    public function logAdmin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email|password' => ['Credenciales incorrectas...'],
            ]);
        }

        $token = $user->createToken($request->email, ['admin:admin'])->plainTextToken;
        return response()->json(["token" => $token], 201);
    }

    //crear usuario
    public function guardar(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);

        if($user -> save())
            return response()->json([$user],201);
        return abort(400,"Error al guardar el Registro");
    }

    //Solo admin puede Borrar
    public function borrar(Request $request,$id){
        if($request->user()->tokenCan('admin:admin'))
            $user=Persona::find($id);
            $user->delete();

        return abort(401, "No tienes Permisos"); 

    }

    //Cambiar propiedades a Usuario
    public function actualizar(Request $request, $id){
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;

        if($user -> save())
            return response()->json(["persona"=>$user],201);

        return response()->json(null,400);
    }
}
