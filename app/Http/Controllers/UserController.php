<?php 

namespace App\Http\Controllers;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;

use Illuminate\Support\Str;

class UserController extends Controller
{

public function store(Request $request)
{
    $input = $request->all();
    $input['usuario_password'] = Hash::make($request->usuario_password);
     Usuario::create($input);
    return response()->jason([
        'res'=>true,
        'mensaje'=>"insertado corectamente"
    ]);
}

/* OBTENER TODOS LOS REGISTROS DE LA TABLA USERS*/
public function indexUsuarios(){
    $usuario = Usuario::all();
    if (count($usuario)>0) {
        return response()->json(['status'=>'ok','data' => $usuario,'Mensaje'=>'Registros de usuario']);
    }else {
        return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No hay registros']);
    }
}

public function createUsuario(Request $request)
{
   
   //var_dump($request);
    $usuario                    = new Usuario;
    //$usuario->nombre          = $request->nombre;
    $usuario->nombre            = $request->usuarios['nombre'];
    $usuario->email             = $request->usuarios['email'];
    $usuario->id_rol            = $request->seleccionado['id_rol'];
    $usuario->name_rol          = $request->seleccionado['nombre'];

    $usuario->usuario_password  = Hash::make($request->usuarios['pass']);
    //$usuario->api_token         = $request->api_token;
   $usuario->save();

    if ($usuario) {
        return response()->json(['status'=>'ok','data' => $usuario,'Mensaje'=>'usuario guardado'],200);
    }else {
        return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No se pudo crear el  usuario'],200);
    }
}

public function login(Request $request){
    $usuario1 = Usuario::whereEmail($request->email)->first();

    $usuario                = new Usuario;
   if(is_null($usuario->nombre) && Hash::check($request->usuario_password,$usuario1->usuario_password))
     {
        //$usuario1 = Usuario::whereEmail($request->email)->first();
        if(Hash::check($request->usuario_password,$usuario1->usuario_password)){ 
        $usuario->api_token = Str::random(150);
       // $usuario->save();
     }
        
        return response()->json([
            'res'     => true,
            'token'   => $usuario->api_token,
            'email'   => $usuario1->email,
            'idrol'   => $usuario1->id_rol,
            'name_rol'   => $usuario1->name_rol,
            'message' => 'Bienvenido al sistema'
        ]);
    }
    else{
        return response()->json([
            'res' => false,
            'message' => 'Cuenta o password incorrecto mar'
        ]);
    }
}

public function logout(Request $request)
{
    $usuario = Usuario::whereEmail($request->email)->first();
   // var_dump($usuario);
    if(!is_null($usuario))
    {
        $usuario->api_token = null;
        $usuario->save();
        
        return response()->json([
                 'res' => true,
                 'message' => 'Adios'
             ]);
    }
    else{
        return response()->json([
            'res' => false,
            'message' => 'no paso nada'
        ]);
    }
    //$user = auth()->Usuario();
    // $user = auth()->usuario();
    // var_dump($user);
    // die;
    // $user->api_token = null;
    // $user->save();

    // return response()->json([
    //     'res' => true,
    //     'message' => 'Adios'
    // ]);
}

public function updateUser(Request $request,$id)
{
    $usuario                = Usuario::find($id);
    $usuario->nombre            = $request->usuario['nombre'];
    $usuario->email             = $request->usuario['email'];
    $usuario->id_rol            = $request->seleccion['id_rol'];
    $usuario->name_rol          = $request->seleccion['nombre'];
    $usuario->usuario_password  = Hash::make($request->usuario['pass']);
   
   $usuario->save();
   if ($usuario) {
    return response()->json(['status'=>'ok','data' => $usuario,'Mensaje'=>'usuario actualizado'],200);
   }else {
    return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No se pudo actualizar el  producto'],200);
   }
}

public function destroyUsuario($id)
{
  
    $usuario = Usuario::find($id);
    $usuario->delete();
    if ($usuario) {
        return response()->json(['status'=>'ok','data' => $usuario,'Mensaje'=>'usua$usuario eliminado'],200);
       }else {
        return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No se pudo eliminar el  usua$usuario'],200);
       }
}

}