<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\User as User;
use Hospital\TipoUsuario as TipoUsuario;
use Hospital\EstatusUsuario as EstatusUsuario;
use Hospital\Http\Requests\UsuariosRegistroRequest;
use Hospital\Http\Requests\UsuariosEditarRequest;
use Auth;
use Session;

class UsuariosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['create', 'index', 'edit']]);
    }

    public function index()
    {
    	$users = User::where('id', '!=', Auth::User()->id)->get();
        $tipo_usuario = TipoUsuario::where('estatus_id', '=', 1)->pluck('tipo_usuario', 'id');
    	return view('usuarios.usuarios')->with('users', $users)->with('tipo_usuario', $tipo_usuario);
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
    	return redirect('/usuarios')->with('message', 'store');
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
        if($request->estatus_usuario == 1) {
            $users->estatus_usuario_id = $request->estatus_usuario;
            $users->num_intentos = 0;
        } else {
            $users->estatus_usuario_id = $request->estatus_usuario;
        }
        $users->username = $request->username;
        if($request->password != "") {
            $users->password = bcrypt($request->password);
        }
        $users->save();
        return redirect('/usuarios')->with('message', 'edit');
    }

    public function show($id)
    {
        $user = User::find($id);
        if(Auth::User()->id != $user->id && Auth::User()->tipo_usuario->clave != '01') {
            Session::flash('message-error', 'Lo sentimos, pero no tienes privilegios de administrador');
            return redirect('/usuarios/'.Auth::User()->id);
        } else {
            return view('usuarios.usuarios_perfil')->with('user', $user);
        }
    }

    public function search(Request $request)
    {
        $users = User::where('tipo_usuario_id', '=', $request->tipo_usuario)->get();
        $tipo_usuario = TipoUsuario::where('estatus_id', '=', 1)->pluck('tipo_usuario', 'id');
        return view('usuarios.usuarios', compact('users'))->with('tipo_usuario', $tipo_usuario)->with('message', 'search');
    }

    public function cambiar_foto(Request $request)
    {
        $user_id = Auth::User()->id;
        $users = User::find($request->id);
        $file = $request->file('file');
        $foto_perfil = $file->getClientOriginalName();
        \Storage::disk('local')->put($foto_perfil, \File::get($file));
        $users->ruta_foto_perfil = "imagenes/fotos_perfil/".$foto_perfil;
        $users->save();
        return redirect('/usuarios/'.$user_id);   
    }
}
