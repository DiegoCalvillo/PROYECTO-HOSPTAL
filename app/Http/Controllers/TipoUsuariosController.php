<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\TipoUsuario as TipoUsuario;
use Hospital\Estatus as Estatus;
use Hospital\Http\Requests\TipoUsuariosRequest;

class TipoUsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$tipos_usuarios = TipoUsuario::all();
    	return view('tipos_usuarios.tipos_usuarios')->with('tipos_usuarios', $tipos_usuarios);
    }

    public function create()
    {
    	$estatus = Estatus::all();
    	return view('tipos_usuarios.tipos_usuarios_registro')->with('estatus', $estatus);
    }

    public function store(TipoUsuariosRequest $request)
    {
    	$tipos_usuarios = new TipoUsuario;
    	$tipos_usuarios->tipo_usuario = $request->tipo_usuario;
    	$tipos_usuarios->estatus_id = $request->estatus_id;
    	$tipos_usuarios->save();
    	return redirect('/tipo_usuarios');
    }
}
