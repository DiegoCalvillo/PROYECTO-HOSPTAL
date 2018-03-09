<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	return view('inicio');
    }

    public function tables()
    {
    	return view('tables');
    }
}
