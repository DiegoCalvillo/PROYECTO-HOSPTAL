<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\User as User;
use Hospital\TipoUsuario as TipoUsuario;
use Hospital\EstatusUsuario as EstatusUsuario;
use Hospital\Http\Requests\UsuariosRegistroRequest;
use Hospital\Http\Requests\UsuariosEditarRequest;

class UsuariosController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('usuarios.usuarios')->with('users', $users);
    }

    public function create()
    {
    	$tipo_usuario = TipoUsuario::where('estatus_id', '=', 1)->get();
    	$estatus_usuario = EstatusUsuario::all();
    	return view('usuarios.usuarios_registro')->with('tipo_usuario', $tipo_usuario)->with('estatus_usuario', $estatus_usuario);
    }

    public function store(UsuariosRegistroRequest $request)
    {
    	$users = new User;
    	$users->name = $request->name;
    	$users->ap_paterno = $request->ap_paterno;
    	$users->ap_materno = $request->ap_materno;
    	$users->email = $request->email;
    	$users->tipo_usuario_id = $request->tipo_usuario;
    	$users->estatus_usuario_id = $request->estatus_usuario;
    	$users->username = $request->username;
    	$users->password = bcrypt($request->password);
    	$users->save();
    	return redirect('/usuarios');
    }

    public function edit($id)
    {
        $users = User::find($id);
        $tipo_usuario = TipoUsuario::where('id', '!=', $users->tipo_usuario_id)->get();
        $estatus_usuario = EstatusUsuario::where('id', '!=', $users->estatus_usuario_id)->get();
        return view('usuarios.usuarios_editar', compact('users'))->with('tipo_usuario', $tipo_usuario)->with('estatus_usuario', $estatus_usuario);

    }

    public function update(UsuariosEditarRequest $request)
    {
        $users = User::find($request->id);
        $users->name = $request->name;
        $users->ap_paterno = $request->ap_paterno;
        $users->ap_materno = $request->ap_materno;
        $users->email = $request->email;
        $users->tipo_usuario_id = $request->tipo_usuario;
        $users->estatus_usuario_id = $request->estatus_usuario;
        $users->username = $request->username;
        if($request->password != "")
        {
            $users->password = bcrypt($request->password);
        }
        $users->save();
        return redirect('/usuarios')->with('message', 'edit');
    }
}
