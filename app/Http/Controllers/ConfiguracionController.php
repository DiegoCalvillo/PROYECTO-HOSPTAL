<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\Configuraciones as Configuraciones;
use Hospital\Estatus as Estatus;

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
        $estatus = Estatus::where('id', '!=', $config->estatus_id)->get();
        return view('configuracion.configuracion_editar', compact('config'))->with('estatus', $estatus);
    }

    public function update(Request $request)
    {
        $config = Configuraciones::find($request->id);
        $config->nombre_configuracion = $request->nombre_configuracion;
        $config->valor = $request->valor;
        $config->estatus_id = $request->estatus_id;
        $config->save();
        return redirect('/configuracion/'.$config->id)->with('message', 'edit');
    }

    public function show($id)
    {
        $config = Configuraciones::find($id);
        return view('configuracion.configuracion_perfil', compact('config'));
    }
}
