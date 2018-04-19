<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\pacientes as pacientes;
use Hospital\EstadosPais as EstadosPais;
use Hospital\Municipios as Municipios;

class PacientesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
        $paciente = pacientes::all();
    	return view('pacientes.pacientes')->with('paciente', $paciente);
    }

    public function create()
    {
    	$estados = EstadosPais::pluck('nombre_estado', 'id');
    	return view('pacientes.pacientes_registro', compact('estados'));
    }

    public function store(Request $request)
    {
        $pacientes = new pacientes;
        $pacientes->nombre_paciente = $request->nombre_paciente;
        $pacientes->ap_paterno = $request->ap_paterno;
        $pacientes->ap_materno = $request->ap_materno;
        $pacientes->genero_paciente = $request->genero_paciente;
        $pacientes->estado_paciente = $request->estados;
        $pacientes->municipio_paciente = $request->municipios;
        $pacientes->calle_paciente = $request->calle_paciente;
        $pacientes->email = $request->email;
        $pacientes->save();
        return redirect('/pacientes');
    }
}
