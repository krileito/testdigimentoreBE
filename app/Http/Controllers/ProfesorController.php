<?php 

namespace App\Http\Controllers;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\DB;
use App\Models\Profesor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;

use Illuminate\Support\Str;

class ProfesorController extends Controller
{

    /* OBTENER TODOS LOS REGISTROS DE LA TABLA PROFESORES*/
public function indexProfesor(){
    $profesor = Profesor::all();
    if (count($profesor)>0) {
        return response()->json(['status'=>'ok','data' => $profesor,'Mensaje'=>'Registros de profesor']);
    }else {
        return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No hay registros']);
    }
}

    public function createProfesor(Request $request)
{
   
   //var_dump($request);

    $profesor                   = new Profesor;
    $profesor->nombres_prof     = $request->nombres_prof;
    $profesor->apellido_prof    = $request->apellido_prof;


    $profesor->save();

    if ($profesor) {
        return response()->json(['status'=>'ok','data' => $profesor,'Mensaje'=>'profesor guardado'],200);
    }else {
        return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No se pudo crear el  profesor'],200);
    }
}

public function updateProfesor(Request $request,$id)
{
    $profesor                    = Profesor::find($id);
    $profesor->nombres_prof      = $request->nombres;
    $profesor->apellido_prof     = $request->apellidos;
   
   
   $profesor->save();
   if ($profesor) {
    return response()->json(['status'=>'ok','data' => $profesor,'Mensaje'=>'profesor actualizado'],200);
   }else {
    return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No se pudo actualizar el  profesor'],200);
   }
}

public function destroyProfesor($id)
{
  
    $profesor = Profesor::find($id);
    $profesor->delete();
    if ($profesor) {
        return response()->json(['status'=>'ok','data' => $profesor,'Mensaje'=>'profesor eliminado'],200);
       }else {
        return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No se pudo eliminar el  profesor'],200);
       }
}


}