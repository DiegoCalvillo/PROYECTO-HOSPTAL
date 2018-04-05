<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function index()
    {
    	return view('pacientes.pacientes');
    }

    public function create()
    {
    	
    }
}
