<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\EstadosPais as EstadosPais;
use Hospital\Municipios as Municipios;

class EstadosMunicipiosController extends Controller
{
    public function getMunicipios(Request $request, $id)
    {
    	if($request->ajax())
    	{
    		$municipios = Municipios::municipios($id);
    		return response()->json($municipios);
    	}
    }
}
