<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\User as User;
use Hospital\TipoUsuario as TipoUsuario;
use Hospital\EstatusUsuario as EstatusUsuario;

class UsuariosController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('usuarios.usuarios')->with('users', $users);
    }

    public function create()
    {
    	$tipo_usuario = TipoUsuario::all();
    	$estatus_usuario = EstatusUsuario::all();
    	return view('usuarios.usuarios_registro')->with('tipo_usuario', $tipo_usuario)->with('estatus_usuario', $estatus_usuario);
    }

    public function store(Request $request)
    {
    	$users = new User;
    	$users->name = $request->name;
    	$users->ap_paterno = $request->ap_paterno;
    	$users->ap_materno = $request->ap_materno;
    	$users->email = $request->email;
    	$users->tipo_usuario_id = $request->tipo_usuario;
    	$users->estatus_usuario_id = $request->estatus_usuario;
    	$users->username = $request->username;
    	$users->password = bcrypt($request->password);
    	$users->save();
    	return redirect('/usuarios');
    }
}
