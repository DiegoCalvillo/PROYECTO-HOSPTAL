<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\User as User;
use Hospital\TipoUsuario as TipoUsuario;

class MedicosController extends Controller
{
    public function index()
    {
    	$tipo_usuario_medico = TipoUsuario::where('clave', '=', '05')->get();
    	$id = $tipo_usuario_medico[0]->id;
    	$medico = User::medicos($id);
    	return view('medicos.medicos')->with('medico', $medico);
    }
}
