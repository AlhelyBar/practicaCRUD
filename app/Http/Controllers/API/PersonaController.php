<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class PersonaController extends Controller
{
    public function index($id=null){
        if($id)
            return response()->json(["persona"=>User::find($id)],200);
        return response()->json(["personas"=>User::all()],200);
    }

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

        $token = $user->createToken($request->email, ['user:info', 'admin:admin'])->plainTextToken;
        return response()->json(["token" => $token], 201);
    }

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

    public function borrar( $id){
        $user=User::find($id);
        $user->delete();
        
        return response()->json(null, 204);

    }

    public function actualizar(Request $request, $id){
        $persona=User::find($id);
        $persona->nombre=$request->nombre;
        $persona->usuario=$request->usuario;
        $persona->contraseña=$request->contraseña;

        if($persona -> save())
            return response()->json(["persona"=>$persona],201);

        return response()->json(null,400);
    }
}
