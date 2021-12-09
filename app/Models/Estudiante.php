<?php
namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Estudiante extends Model implements AuthenticatableContract, AuthorizableContract
{

use Authenticatable, Authorizable;

protected $table ='estudiantes';
protected $primarykey ='id_estu';
protected $filelabel = ['nombres','apellidos','materia','calificacion'];



}
