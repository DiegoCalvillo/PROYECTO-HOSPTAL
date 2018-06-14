<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use Hospital\User as User;
use Hospital\Configuraciones as Configuraciones;
use Hospital\Http\Requests;
use Hospital\Http\Requests\LoginRequest;
use Hospital\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
    	return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
    	if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']]))
    	{
    		if(Auth::user()->estatus_usuario_id == 0)
    		{
    			Session::flash('message-error', 'Cuenta de Usuario Bloqueada');
    			return Redirect::to('/login');
    		}
            if(Auth()->user()->num_intentos > 0)
            {
                $attempt_user = User::where('username', '=', $request['username'])->get();
                $user = User::find($attempt_user[0]->id);
                $user->num_intentos = 0;
                $user->save();
            }
    		return Redirect::to('/');
    	}
        else
        {
            $attempt_user = User::where('username', '=', $request['username'])->get();
            $user = User::find($attempt_user[0]->id);
            if($attempt_user[0]->num_intentos == 0) {
                $user->num_intentos = 1;
                $user->save();
                Session::flash('message-error', 'Acceso denegado');
            } else {
                $num_intentos = $attempt_user[0]->num_intentos;
                $intentos_login = Configuraciones::numero_intentos()->valor;
                $user->num_intentos = $num_intentos + 1;
                if($user->num_intentos >= $intentos_login) {
                    $user->estatus_usuario_id = 0;
                    $user->save();
                    Session::flash('message-error', 'Has superado la cantidad intentos permitidos. Cuenta Bloqueada');
                } else {
                    $user->save();
                    Session::flash('message-error', 'Acceso denegado');
                }
            }
            return Redirect::to('/login');
        }
    }

    public function logout()
    {
    	Auth::logout();
    	return Redirect::to('/login');
    }
}
