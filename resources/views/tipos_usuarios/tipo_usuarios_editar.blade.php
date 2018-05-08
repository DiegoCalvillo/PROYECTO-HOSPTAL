@extends('layouts.principal')

@section('content_tipo_usuarios_editar')
<div class="content-wrapper">
	{!! Form::model($tipos_usuarios, ['route' => 'tipo_usuarios/update', 'method' => 'put', 'novalidate']) !!}
	{!! Form::hidden('id', $tipos_usuarios->id) !!}
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/tipo_usuarios">Tipos de Usuarios</a>
			</li>
			<li class="breadcrumb-item active">Edición</li>
		</ol>
		<div class="row">
			<div class="col-12">
				<h1>{{ $tipos_usuarios->tipo_usuario }}</h1>
			</div>
		</div>
		<div class="container">
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
								<option value="{{ $tipos_usuarios->estatus_id }}">Seleccione</option>
								<?php foreach($estatus as $estatus){
									echo '<option value="'.$estatus['id'].'">'.$estatus['nombre_estatus'].'</option>';
								}?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<button class="btn btn-primary" type="submit">Grabar</button>
		</div>
	</div>
</div>
@stop