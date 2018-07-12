@extends('layouts.principal')

@section('content_cambio_contrasena')
<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/usuarios">Usuarios</a>
			</li>
			<li class="breadcrumb-item active">
				Cambio de contraseña
			</li>
		</ol>
		@include('alerts.request')
		<div class="container">
			{!! Form::open(['route' => 'usuarios/cambio_contrasena_store', 'method' => 'POST']) !!}
			{!! Form::hidden('id', $users->id) !!}
			@include('alerts.errors')
			<div class="card-header">
				<b>Cambio de contraseña para:</b> {{ $users->name }} {{ $users->ap_paterno }}
			</div>
			<div class="card-body">
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-4">
							{!! Form::label('full_name', 'Contraseña Actual') !!}
							<input class="form-control" id="exampleInputName" type="password" aria-describedby="nameHelp" name="old_password">
						</div>
						<div class="col-md-4">
							{!! Form::label('full_name', 'Nueva contraseña') !!}
							<input class="form-control" id="exampleInputName" type="password" aria-describedby="nameHelp" name="password">
						</div>
						<div class="col-md-4">
							{!! Form::label('full_name', 'Confirmación de contraseña') !!}
							<input class="form-control" id="exampleInputName" type="password" aria-describedby="nameHelp" name="password_confirmation">
						</div>
					</div>
				</div>
			</div>
			<button class="btn btn-primary" type="submit">Actualizar</button>
		</div>
	</div>
</div>
@stop