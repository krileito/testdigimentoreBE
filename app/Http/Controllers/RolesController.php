<?php 

namespace App\Http\Controllers;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\DB;
use App\Models\Roles;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;

use Illuminate\Support\Str;

class RolesController extends Controller
{


     /* OBTENER TODOS LOS REGISTROS DE LA TABLA ROLES*/
     public function indexRoles(){
        $roles = Roles::all();
        if (count($roles)>0) {
            return response()->json(['status'=>'ok','data' => $roles,'Mensaje'=>'Registros de Roles']);
        }else {
            return response()->json(['status'=>'fail','data' => array(),'Mensaje'=>'No hay registros']);
        }
    }






}