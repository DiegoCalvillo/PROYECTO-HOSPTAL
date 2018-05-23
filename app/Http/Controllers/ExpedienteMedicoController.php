<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\pacientes as pacientes;
use Hospital\ExpedienteClinico as ExpedienteClinico;
use Hospital\User as User;
use Hospital\TipoUsuario as TipoUsuario;
use Hospital\Padecimiento as Padecimiento;
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
        $padecimiento = Padecimiento::pluck('nombre_padecimiento', 'id');
    	$tipo_usuario_medico = TipoUsuario::where('clave', '=', '05')->get();
    	if(Auth::user()->tipo_usuario->clave == '05') {
    		$medico = User::where('id', '=', Auth::user()->id)->pluck('name', 'id');
    	} else {
    		$medico = User::where('tipo_usuario_id', '=', $tipo_usuario_medico[0]->id)->pluck('name', 'id');
    	}
    	return view('expedientes_medicos.expedientes_medicos_registro')->with('paciente', $paciente)->with('medico', $medico)->with('padecimiento', $padecimiento);
    }

    public function store(Request $request)
    {
        $paciente = pacientes::find($request->id);
        $expediente = new ExpedienteClinico;
        $expediente->medico_id = $request->medico;
        $expediente->padecimiento_id = $request->padecimiento;
        $expediente->estatura = $request->estatura;
        $expediente->peso = $request->peso;
        $expediente->observaciones = $request->observaciones;
        $expediente->save();
        $paciente->expediente_id = $expediente->id;
        $paciente->save();
        return redirect('/pacientes');
    }
}
