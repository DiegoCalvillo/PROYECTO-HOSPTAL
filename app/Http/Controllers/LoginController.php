<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use Hospital\User as User;
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
    			return Redirect::to('/');
    	}
        else
        {
            $attempt_user = User::where('username', '=', $request['username'])->get();
            if($attempt_user[0]->num_intentos == 0) {
                $user = User::find($attempt_user[0]->id);
                $user->num_intentos = 1;
                $user->save();
                Session::flash('message-error', 'Acceso denegado');
            } else {
                $user = User::find($attempt_user[0]->id);
                $num_intentos = $attempt_user[0]->num_intentos;
                $user->num_intentos = $num_intentos + 1;
                if($user->num_intentos == 3) {
                    $user->estatus_usuario_id = 0;
                    $user->save();
                    Session::flash('message-error', 'Han sido 3 intentos. Cuenta Bloqueada');
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
