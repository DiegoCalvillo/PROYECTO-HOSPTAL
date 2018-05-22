<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\pacientes as pacientes;
use Hospital\ExpedienteClinico as ExpedienteClinico;
use Hospital\User as User;
use Hospital\TipoUsuario as TipoUsuario;
use Auth;

class ExpedienteMedicoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}	

    public function create($id)
    {
    	$paciente = pacientes::find($id);
    	$tipo_usuario_medico = TipoUsuario::where('clave', '=', '05')->get();
    	if(Auth::user()->tipo_usuario->clave == '05') {
    		$medico = User::where('id', '=', Auth::user()->id)->pluck('name', 'id');
    	} else {
    		$medico = User::where('tipo_usuario_id', '=', $tipo_usuario_medico[0]->id)->pluck('name', 'id');
    	}
    	return view('expedientes_medicos.expedientes_medicos_registro')->with('paciente', $paciente)->with('medico', $medico);
    }
}
