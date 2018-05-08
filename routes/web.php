<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Rutas de PrincipalController*/
Route::resource('/', 'PrincipalController');
Route::get('/tables', 'PrincipalController@tables');

/*Rutas de UsuariosController*/
Route::resource('/usuarios', 'UsuariosController');
Route::get('usuarios/create', 'UsuariosController@create');
Route::post('usuarios/store', 'UsuariosController@store');
Route::get('usuarios/{id}/edit', ['as' => 'usuarios/edit', 'uses' => 'UsuariosController@edit']);
Route::put('usuarios/update', ['as' => 'usuarios/update', 'uses' => 'UsuariosController@update']);

/*Rutas de TipoUsuariosController*/
Route::resource('/tipo_usuarios', 'TipoUsuariosController');
Route::get('tipo_usuarios/create', 'TipoUsuariosController@create');
Route::post('tipo_usuarios/store', 'TipoUsuariosController@store');
Route::get('tipo_usuarios/{id}/edit', ['as' => 'tipo_usuarios/edit', 'uses' => 'TipoUsuariosController@edit']);
Route::put('tipo_usuarios/update', ['as' => 'tipo_usuarios/update', 'uses' => 'TipoUsuariosController@update']);
Route::get('tipo_usuarios/{id}', ['as' => 'tipo_usuarios/show', 'uses' => 'TipoUsuariosController@show']);

/*Rutas de EstadosMunicipiosController*/
Route::get('municipios/{id}', 'EstadosMunicipiosController@getMunicipios');

/*Rutas de LoginController*/
Route::resource('/login', 'LoginController');
Route::post('login/store', 'LoginController@store');
Route::get('logout', 'LoginController@logout');

/*Rutas para PacientesController*/
Route::resource('/pacientes', 'PacientesController');
Route::get('pacientes/create', 'PacientesController@create');
Route::post('pacientes/store', 'PacientesController@store');
Route::get('pacientes/{id}/edit', ['as' => 'pacientes/edit', 'uses' => 'PacientesController@edit']);
Route::put('pacientes/update', ['as' => 'pacientes/update', 'uses' => 'PacientesController@update']);
Route::get('pacientes/{id}', ['as' => 'pacientes/show', 'uses' => 'PacientesController@show']);

Auth::routes();
