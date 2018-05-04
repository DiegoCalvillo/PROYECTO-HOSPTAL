@extends('layouts.principal')

@section('content_pacientes_editar')
<div class="content-wrapper">
	{!! Form::model($paciente, ['route' => 'pacientes/update', 'method' => 'put', 'novalidate']) !!}
	{!! Form::hidden('id', $paciente->id) !!}
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/pacientes">Pacientes</a>
			</li>
			<li class="breadcrumb-item active">Edición de Pacientes</li>
		</ol>
		@include('alerts.request')
		<div class="row">
			<div class="col-md-12">
				<h1>{{ $paciente->ap_paterno }} {{ $paciente->ap_materno }}, {{ $paciente->nombre_paciente }}</h1>
			</div>
		</div>
		<div class="container">
			<div class="card-header">
				<b>Datos generales del paciente</b>
			</div>
			<div class="card-body">
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-4">
							{!! Form::label('full_name', 'Nombre *') !!}
							{!! Form::text('nombre_paciente', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
						</div>
						<div class="col-md-4">
							{!! Form::label('full_name', 'Primer Apellido *') !!}
							{!! Form::text('ap_paterno', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno']) !!}
						</div>
						<div class="col-md-4">
							{!! Form::label('full_name', 'Segundo Apellido *') !!}
							{!! Form::text('ap_materno', null, ['class' => 'form-control', 'placeholder' => 'Apellido materno']) !!}
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-4">
							{!! Form::label('full_name', 'Genero del Paciente *') !!}
							<select class="form-control" name="genero_paciente">
								<option value="{{ $paciente->genero_paciente }}">Seleccione</option>
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
							{!! Form::label('full_name', 'Estado *') !!}
							{!! Form::select('estados', $estados, $paciente->estado_paciente, ['id' => 'estados', 'class' => 'form-control', 'placeholder' => 'Seleccione el estado']) !!}
						</div>
						<div class="col-md-6">
							{!! Form::label('full_name', 'Municipio o delegación *') !!}
							@if(!empty($paciente->municipio_paciente))
								<select class="form-control" name="municipios">
									<option value="{{ $paciente->municipio_paciente }}">{{ $paciente->municipios->nombre_municipio }}</option>
								</select>
							@else
								{!! Form::select('municipios', ['placeholder' => 'Seleccione el Municipio'], null, ['id' => 'municipios', 'class' => 'form-control', 'required' => 'required']) !!}
							@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-8">
							{!! Form::label('full_name', 'Colonia *') !!}
							{!! Form::text('colonia_paciente', null, ['class' => 'form-control']) !!}
						</div>
						<div class="col-md-4">
							{!! Form::label('full_name', 'Código Postal') !!}
							{!! Form::text('numero_postal_paciente', null, ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6">
							{!! Form::label('full_name', 'Calle *') !!}
							{!! Form::text('calle_paciente', null, ['class' => 'form-control']) !!}
						</div>
						<div class="col-md-6">
							{!! Form::label('full_name', 'Número o Apartamento *') !!}
							{!! Form::text('numero_casa_paciente', null, ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
			</div>
			<button class="btn btn-primary" type="submit">Guardar Cambios</button>
		</div>
	</div>
</div>
@stop
{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/dropdown_estados_editar.js') !!}