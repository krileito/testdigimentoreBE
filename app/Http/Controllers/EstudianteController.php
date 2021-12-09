<?php 

namespace App\Http\Controllers;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\DB;
use App\Models\Estudiante;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;

use Illuminate\Support\Str;

class EstudianteController extends Controller
{

    /* OBTENER TODOS LOS REGISTROS DE LA TABLA ESTUDIANTES*/
public function indexEstudiantes(){
    $estudiante = Estudiante::all();
    if (count($estudiante)>0) {
        return response()->json(['status'=>'ok','data' => $estudiante,'Mensaje'=>'Registros de es$estudiante']);
    }else {
        return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No hay registros']);
    }
}

    public function createEstudiante(Request $request)
{
   
   //var_dump($request);

    $estudiante                    = new Estudiante;
    $estudiante->nombres           = $request->nombre_est;
    $estudiante->apellidos         = $request->apellido_est;
    $estudiante->materia           = $request->materia_est;


    $estudiante->save();

    if ($estudiante) {
        return response()->json(['status'=>'ok','data' => $estudiante,'Mensaje'=>'estudiante guardado'],200);
    }else {
        return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No se pudo crear el  estudiante'],200);
    }
}

public function updateEstudiante(Request $request,$id_estu)
{
    $estudiante                = Estudiante::find($id_estu);
    $estudiante->nombres           = $request->nombres;
    $estudiante->apellidos         = $request->apellidos;
    $estudiante->materia           = $request->materia;
   
   $estudiante->save();
   if ($estudiante) {
    return response()->json(['status'=>'ok','data' => $estudiante,'Mensaje'=>'es$estudiante actualizado'],200);
   }else {
    return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No se pudo actualizar el  estudiante'],200);
   }
}

}