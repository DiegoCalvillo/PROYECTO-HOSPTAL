<?php

namespace Hospital\Http\Controllers;

use Illuminate\Http\Request;
use Hospital\pacientes as pacientes;
use Hospital\EstadosPais as EstadosPais;
use Hospital\Municipios as Municipios;
use Hospital\User as User;
use Hospital\TipoUsuario as TipoUsuario;
use Hospital\ExpedienteClinico as ExpedienteClinico;
use Auth;
use Hospital\Http\Requests\PacientesRequest;
use JavaScript;

class PacientesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
        if(Auth::User()->tipo_usuario->clave == '05'){
            $medico = Auth::User()->id;
            $paciente = pacientes::where('medico_id', '=', $medico)->get();
        } else {
            $paciente = pacientes::all();
        }
    	return view('pacientes.pacientes')->with('paciente', $paciente);
    }

    public function create()
    {
    	$estados = EstadosPais::pluck('nombre_estado', 'id');
        $tipo_usuario_medico = TipoUsuario::where('clave', '=', '05')->get();
        $medico = User::where('tipo_usuario_id', '=', $tipo_usuario_medico[0]->id)->where('estatus_usuario_id', '=', 1)->pluck('name', 'id');
    	return view('pacientes.pacientes_registro', compact('estados'))->with('medico', $medico);
    }

    public function store(PacientesRequest $request)
    {
        $pacientes = new pacientes;
        $pacientes->nombre_paciente = $request->nombre_paciente;
        $pacientes->ap_paterno = $request->ap_paterno;
        $pacientes->ap_materno = $request->ap_materno;
        $pacientes->genero_paciente = $request->genero_paciente;
        $pacientes->estado_paciente = $request->estados;
        $pacientes->municipio_paciente = $request->municipios;
        $pacientes->calle_paciente = $request->calle_paciente;
        $pacientes->email = $request->email;
        $pacientes->colonia_paciente = $request->colonia_paciente;
        $pacientes->numero_casa_paciente = $request->numero_casa_paciente;
        $pacientes->numero_postal_paciente = $request->numero_postal_paciente;
       if(Auth::User()->tipo_usuario->clave == '05') {
            $pacientes->medico_id = Auth::User()->id;    
        } else {
             $pacientes->medico_id = $request->medico;
        }
        $pacientes->save();
        return redirect('/pacientes')->with('message', 'store');
    }

    public function edit($id)
    {
        $paciente = pacientes::find($id);
        $estados = EstadosPais::pluck('nombre_estado', 'id');
        $municipios = Municipios::where('id', '=', $paciente->municipio_paciente)->get();
        $tipo_usuario_medico = TipoUsuario::where('clave', '=', '05')->get();
        $medico = User::where('tipo_usuario_id', '=', $tipo_usuario_medico[0]->id)->where('estatus_usuario_id', '=', 1)->pluck('name', 'id');
        return view('pacientes.pacientes_editar', compact('paciente'))->with('estados', $estados)->with('municipios', $municipios)->with('medico', $medico);
    }

    public function show($id)
    {
        $paciente = pacientes::find($id);
        $expediente = ExpedienteClinico::find($paciente->expediente_id);
        return view('pacientes.pacientes_perfil')->with('paciente', $paciente)->with('expediente', $expediente);
    }

    public function update(Request $request)
    {
        $pacientes = pacientes::find($request->id);
        $pacientes->nombre_paciente = $request->nombre_paciente;
        $pacientes->ap_paterno = $request->ap_paterno;
        $pacientes->ap_materno = $request->ap_materno;
        $pacientes->genero_paciente = $request->genero_paciente;
        $pacientes->estado_paciente = $request->estados;
        $pacientes->municipio_paciente = $request->municipios;
        $pacientes->calle_paciente = $request->calle_paciente;
        $pacientes->email = $request->email;
        $pacientes->colonia_paciente = $request->colonia_paciente;
        $pacientes->numero_casa_paciente = $request->numero_casa_paciente;
        $pacientes->numero_postal_paciente = $request->numero_postal_paciente;
        $pacientes->medico_id = $request->medico;
        $pacientes->save();
        return redirect('/pacientes')->with('message', 'edit');
    }
}
