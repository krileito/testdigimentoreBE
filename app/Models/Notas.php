<?php
namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Notas extends Model implements AuthenticatableContract, AuthorizableContract
{

use Authenticatable, Authorizable;

protected $table ='notas';
protected $primarykey ='id';
protected $filelabel = ['id_estudiante','name_estudiante','id_profesor','name_profe','id_rol','name_rol','nota1','nota2','nota3'];






}
