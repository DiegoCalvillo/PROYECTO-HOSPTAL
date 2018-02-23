<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\User as User;

class UsuariosController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('usuarios.usuarios')->with('users', $users);
    }
}
