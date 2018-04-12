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
    	return view('pacientes.pacientes');
    }

    public function create()
    {
    	$estados = EstadosPais::pluck('nombre_estado', 'id');
    	return view('pacientes.pacientes_registro', compact('estados'));
    }

    public function getMunicipios(Request $request, $id)
    {
    	if($request->ajax())
    	{
    		$municipios = Municipios::municipios($id);
    		return response()->json($municipios);
    	}
    }
}
