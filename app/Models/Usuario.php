<?php
namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Usuario extends Model implements AuthenticatableContract, AuthorizableContract
{

use Authenticatable, Authorizable;

protected $table ='users';
protected $primarykey ='id';
protected $filelabel = ['nombre','email','usuario_password','api_token','id_rol','name_rol'];



}
