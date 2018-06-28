<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\Configuraciones as Configuraciones;

class ConfiguracionController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
	
    public function index()
    {
    	$config = Configuraciones::all();
    	return view('configuracion.configuracion')->with('config', $config);
    }

    public function edit($id)
    {
        $config = Configuraciones::find($id);
        return view('configuracion.configuracion_editar', compact('config'));
    }

    public function update(Request $request)
    {
        $config = Configuraciones::find($request->id);
        $config->nombre_configuracion = $request->nombre_configuracion;
        $config->valor = $request->valor;
        $config->save();
        return redirect('/configuracion');
    }

    public function show($id)
    {
        $config = Configuraciones::find($id);
        return view('configuracion.configuracion_perfil', compact('config'));
    }
}
