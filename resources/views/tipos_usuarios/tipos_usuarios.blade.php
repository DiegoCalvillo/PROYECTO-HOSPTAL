@extends('layouts.principal')

@section('content_tipo_usuarios')
<div class="content-wrapper">
	<form method="POST" action="http://192.168.1.71:8080/tipo_usuarios/search">
		<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item active">Tipos de Usuarios</li>
		</ol>
		<?php $message=Session::get('message') ?>

			@if($message == 'store')
				<div class="alert alert-success" role="alert">
        		Registro creado exitosamente <a href="/tipo_usuarios" class="alert-link">Click aqui para quitar mensaje</a>.
        		</div>
			@endif

			@if($message == 'edit')
				<div class="alert alert-success" role="alert">
        		Registro modificado exitosamente <a href="/tipo_usuarios" class="alert-link">Click aqui para quitar mensaje</a>.
        		</div>
			@endif
		<div class="row">
			<div class="col-6">
				<h1>Tipos de Usuarios</h1>
			</div>
		</div>
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i>
				Total de Registros: <b>{{ $tipos_usuarios->count() }}</b>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<div class="row">
						<div class="col-4">
							<b>Buscar por nombre: </b> {!! Form::text('tipo_usuario', null, ['class' => 'form-control', 'placeholder' => 'Por Tipo de Usuario']) !!}
						</div>
						<div>
							<br>
							<button class="btn btn-primary" type="submit">Buscar</button>
						</div>
					</div>
					<br>
					<table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
						<thead>
							<tr>
								<th>Tipo de Usuario</th>
								<th>Estatus</th>
								<th>Clave</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tipos_usuarios as $tipos_usuarios)
								<tr>
									<td>
										<a href="{{ route('tipo_usuarios/show', ['id' => $tipos_usuarios->id]) }}">{{ $tipos_usuarios->tipo_usuario }}</a>
									</td>
									<td>{{ $tipos_usuarios->estatus->nombre_estatus }}</td>
									<td>{{ $tipos_usuarios->clave }}</td>
									<td>
										<a class="glyphicon glyphicon-pencil" title="Editar" href="{{ route('tipo_usuarios/edit', ['id' => $tipos_usuarios->id] )}}"><i class="fa fa-fw fa-pencil"></i></a>
									</td>								
								</tr>
							@endforeach
						</tbody>
					</table>
					@if($tipos_usuarios->count() == 0)
						<div class="alert alert-danger" role="alert">
							No se han encontrado resultados
						</div>
					@endif
					<div class="col-4">
						<a class="btn btn-primary btn-block" href="tipo_usuarios/create">Crear Nuevo</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
@stop