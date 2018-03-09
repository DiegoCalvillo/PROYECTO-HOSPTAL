<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\TipoUsuario as TipoUsuario;

class TipoUsuariosController extends Controller
{
    public function index()
    {
    	$tipos_usuarios = TipoUsuario::all();
    	return view('tipos_usuarios.tipos_usuarios')->with('tipos_usuarios', $tipos_usuarios);
    }
}
