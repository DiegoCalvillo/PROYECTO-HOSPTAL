@extends('layouts.principal')

@section('content_tipo_usuarios_registro')
<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/tipo_usuarios">Tipos de Usuarios</a>
			</li>
			<li class="breadcrumb-item active">Registro de Tipos de Usuarios</li>
		</ol>
		@include('alerts.request')
		<div class="container">
			<form method="POST" action="http://192.168.1.66:8080/tipo_usuarios/store">
				<div class="card-header">
					<b>Información de Registro</b>
				</div>
				<div class="card-body">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-4">
								{!! Form::label('full_name', 'Tipo de Usuario') !!}
								{!! Form::text('tipo_usuario', null, ['class' => 'form-control']) !!}
							</div>
							<div class="col-md-4">
								{!! Form::label('full_name', 'Clave') !!}
								{!! Form::text('clave', null, ['class' => 'form-control']) !!}
							</div>
							<div class="col-md-4">
								{!! Form::label('full_name', 'Estatus') !!}
								<select class="form-control" name="estatus_id">
									<option value="" selected="1">Seleccione</option>
									<?php foreach($estatus as $estatus){
										echo '<option value="'.$estatus['id'].'">'.$estatus['nombre_estatus'].'</option>';
									}?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<button class="btn btn-primary" type="submit">Grabar</button>
			</form>
		</div>
	</div>
</div>
@stop