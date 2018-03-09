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

/*Rutas de LoginController*/
Route::resource('/login', 'LoginController');
Route::post('login/store', 'LoginController@store');
Route::get('logout', 'LoginController@logout');

Auth::routes();
