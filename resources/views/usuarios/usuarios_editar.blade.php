@extends('layouts.principal')

@section('content_usuarios_editar')
<div class="content-wrapper">
	{!! Form::model($users, ['route' => 'usuarios/update', 'method' => 'put', 'novalidate']) !!}
	{!! Form::hidden('id', $users->id) !!}
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/usuarios">Usuarios</a>
			</li>
			<li class="breadcrumb-item active">Edición de Usuarios</li>
		</ol>
		@include('alerts.request')
		<div class="row">
			<div class="col-12">
				<h1>{{ $users->ap_paterno }} {{ $users->ap_materno }}, {{ $users->name }}</h1>
			</div>
		</div>
		<div class="container">
				<div class="card-header">
					<b>Información General</b>
				</div>
				<div class="card-body">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-4">
								{!! Form::label('full_name', 'Nombre') !!}
								{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
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
							<div class="col-md-12">
								{!! Form::label('full_name', 'Correo electrónico') !!}
								{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ej. usuario@gmail.com']) !!}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								{!! Form::label('full_name', 'Tipo de Usuario') !!}
								<select class="form-control" name="tipo_usuario">
									<option value="{{ $users->tipo_usuario_id }}">Seleccione</option>
									<?php foreach($tipo_usuario as $tipo_usuario){
										echo '<option value="'.$tipo_usuario['id'].'">'.$tipo_usuario['tipo_usuario'].'</option>';
									}?>
								</select>
							</div>
							<div class="col-md-6">
								{!! Form::label('full_name', 'Estatus del Usuario') !!}
								<select class="form-control" name="estatus_usuario">
									<option value="{{ $users->estatus_usuario_id }}">Seleccione</option>
									<?php foreach($estatus_usuario as $estatus_usuario){
										echo '<option value="'.$estatus_usuario['id'].'">'.$estatus_usuario['estatus_usaurio'].'</option>';
									}?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="card-header">
					<b>Credenciales de Usuario</b>
				</div>
				<div class="card-body">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12">
								{!! Form::label('full_name', 'Nombre de Usuario') !!}
								{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Usuario']) !!}
							</div>
						</div>
					</div>
					@if(Auth::User()->id != $users->id)
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									<label for="exampleInputName">Contraseña</label>
									<input class="form-control" id="exampleInputName" type="password" aria-describedby="nameHelp" name="password">
								</div>
								<div class="col-md-6">
									<label for="exampleInputName">Confirmar Contraseña</label>
									<input class="form-control" id="exampleInputName" type="password" aria-describedby="nameHelp" name="password_confirmation">
								</div>
							</div>
						</div>
					@endif
				</div>
				<button class="btn btn-primary" type="submit">Grabar</button>
		</div>
	</div>
</div>
@stop