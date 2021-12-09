<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/home', function () use ($router) {
    echo 'este es el home';
});

$router->get('/', function () use ($router) {
   return $router->app->version();
});


$router->post('/login','UserController@login');

$router->get('/roles', ['as' => 'roles', 'uses' => 'RolesController@indexRoles']);

$router->get('/allusuarios', ['as' => 'roles', 'uses' => 'UserController@indexUsuarios']);

$router->get('/allestudiantes', ['as' => 'estudiante', 'uses' => 'EstudianteController@indexEstudiantes']);

$router->get('/allprofesores', ['as' => 'profesor', 'uses' => 'ProfesorController@indexProfesor']);

$router->post('/update_usuario/{id}','UserController@updateUser');
$router->delete('/delete_usuario/{id}','UserController@destroyUsuario');

$router->post('/update_estudiante/{id_estu}','EstudianteController@updateEstudiante');

$router->post('/update_profesor/{id}','ProfesorController@updateProfesor');
$router->delete('/delete_profesor/{id}','ProfesorController@destroyProfesor');

$router->post('/usuario','UserController@createUsuario');


$router->post('/search_estu/','NotasController@searchNota');

$router->post('/notas','NotasController@createNota');

$router->post('/profesor','ProfesorController@createProfesor');

$router->post('/estudiante','EstudianteController@createEstudiante');



$router->post('/logout','UserController@logout');
$router->group(['middleware' => 'auth'], function () use ($router) {
    /* rutas de productos */
  

//$router->get('productos','ProductoController@index');


// $router->get('usuario', function () use ($router) {
//     return auth()->Usuario();
// });

});