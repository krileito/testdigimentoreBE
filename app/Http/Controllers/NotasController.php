<?php 

namespace App\Http\Controllers;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\DB;
use App\Models\Notas;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;

use Illuminate\Support\Str;

class NotasController extends Controller
{



    public function createNota(Request $request)
{
   
    $notas                      = new Notas;
    $notas->name_estudiante     = $request->nombre_est.' '. $request->apellido_est;
    $notas->id_estudiante       = $request->id_estudiante;
    $notas->id_rol              = $request->id_rol;
    $notas->nota1               = $request->nota1;
    $notas->nota2               = $request->nota2;
    $notas->nota3               = $request->nota3;

    $notas->save();

    if ($notas) {
        return response()->json(['status'=>'ok','data' => $notas,'Mensaje'=>'notas guardado'],200);
    }else {
        return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No se pudo crear el  notas'],200);
    }
}


public function searchNota(Request $request)
{
    $id = $request->id;

    $data = Notas::where('id', $id)->get();

        if(count($data) > 0){
            return response ($data);
        }else{
            return response()->json(['status'=>'fail','data' => $data,'Mensaje'=>'No hay registros']);
        }
}



}