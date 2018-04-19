@extends('layouts.principal')

@section('content_pacientes_registro')
<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/pacientes">Pacientes</a>
			</li>
			<li class="breadcrumb-item active">Registro de Pacientes</li>
		</ol>
		<div class="container">
			<form method="POST" action="http://192.168.1.66:8080/pacientes/store">
				<div class="card card-register mx-auto mt-5">
					<div class="card-header">
						<b>Datos generales del paciente</b>
					</div>
					<div class="card-body">
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									{!! Form::label('full_name', 'Nombre') !!}
									{!! Form::text('nombre_paciente', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
								</div>
								<div class="col-md-4">
									{!! Form::label('full_name', 'Primer Apellido') !!}
									{!! Form::text('ap_paterno', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno']) !!}
								</div>
								<div class="col-md-4">
									{!! Form::label('full_name', 'Segundo Apellido') !!}
									{!! Form::text('ap_materno', null, ['class' => 'form-control', 'placeholder' => 'Apellido materno']) !!}
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									{!! Form::label('full_name', 'Genero del Paciente') !!}
									<select class="form-control" name="genero_paciente">
										<option value="">Seleccione</option>
										<option value="1">Masculino</option>
										<option value="2">Femenino</option>
									</select>
								</div>
								<div class="col-md-8">
									{!! Form::label('full_name', 'Correo electrónico') !!}
									{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ej. usuario@gmail.com']) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="card-header">
						<b>Dirección</b>
					</div>
					<div class="card-body">
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									{!! Form::label('full_name', 'Estado') !!}
									{!! Form::select('estados', $estados, null, ['id' => 'estados', 'class' => 'form-control', 'placeholder' => 'Seleccione']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('full_name', 'Municipio o delegación') !!}
									{!! Form::select('municipios', ['placeholder' => 'Seleccione el Municipio'], null, ['id' => 'municipios', 'class' => 'form-control', 'required' => 'required']) !!}
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									{!! Form::label('full_name', 'Calle') !!}
									{!! Form::text('calle_paciente', null, ['class' => 'form-control']) !!}
								</div>
								<div class="col-md-6">
									{!! Form::label('full_name', 'Número o Apartamento') !!}
									{!! Form::text('numero_casa_paciente', null, ['class' => 'form-control']) !!}
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-primary" type="submit">Registrar Paciente</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop
