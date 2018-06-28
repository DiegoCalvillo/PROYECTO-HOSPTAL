@extends('layouts.principal')

@section('content_configuracion_editar')
<div class="content-wrapper">
	{!! Form::model($config, ['route' => 'configuracion/update', 'method' => 'put', 'novalidate']) !!}
	{!! Form::hidden('id', $config->id) !!}
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url('/') }}">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="{{ url('/configuracion') }}">Configuración</a>
			</li>
			<li class="breadcrumb-item active">
				{{ $config->nombre_configuracion }}
			</li>
		</ol>
		<div class="container">
			<div class="card-header">
				<b>Información de Registro</b>
			</div>
			<div class="card-body">
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-4">
							{!! Form::label('full_name', 'Nombre de Configuración') !!}
							{!! Form::text('nombre_configuracion', null, ['class' => 'form-control']) !!}
						</div>
						<div class="col-md-4">
							{!! Form::label('full_name', 'Valor') !!}
							{!! Form::text('valor', null, ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
			</div>
			<button class="btn btn-primary" type="submit">Grabar</button>
		</div>
	</div>
</div>
@stop
