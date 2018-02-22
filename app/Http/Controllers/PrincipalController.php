<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index()
    {
    	return view('inicio');
    }
}
