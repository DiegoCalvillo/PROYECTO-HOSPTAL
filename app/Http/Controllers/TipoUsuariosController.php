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
        $this->middleware('admin');
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
        $tipos_usuarios->clave = $request->clave;
    	$tipos_usuarios->save();
    	return redirect('/tipo_usuarios')->with('message', 'store');
    }

    public function edit($id)
    {
        $tipos_usuarios = TipoUsuario::find($id);
        $estatus = Estatus::where('id', '!=', $tipos_usuarios->estatus_id)->get();
        return view('tipos_usuarios.tipo_usuarios_editar', compact('tipos_usuarios'))->with('tipos_usuarios', $tipos_usuarios)->with('estatus', $estatus);

    }

    public function update(Request $request)
    {
        $tipos_usuarios = TipoUsuario::find($request->id);
        $tipos_usuarios->tipo_usuario = $request->tipo_usuario;
        $tipos_usuarios->estatus_id = $request->estatus_id;
        $tipos_usuarios->clave = $request->clave;
        $tipos_usuarios->save();
        return redirect('/tipo_usuarios')->with('message', 'edit');
    }

    public function show($id)
    {
        $tipo_usuario = TipoUsuario::find($id);
        return view('tipos_usuarios.tipos_usuarios_perfil')->with('tipo_usuario', $tipo_usuario);
    }

    public function search(Request $request)
    {
        $tipos_usuarios = TipoUsuario::where('tipo_usuario', 'like', '%'.$request-> tipo_usuario.'%')->get();
        return view('tipos_usuarios.tipos_usuarios', compact('tipos_usuarios'));
    }
}
