@extends('layouts.principal')

@section('content_usuarios')
<div class="content-wrapper">
	<form method="POST" action="http://192.168.1.66:8080/usuarios/search">
		<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item active">Usuarios</li>
		</ol>
		<?php $message=Session::get('message') ?>

			@if($message == 'store')
				<div class="alert alert-success" role="alert">
        		Registro creado exitosamente <a href="/usuarios" class="alert-link">Click aqui para quitar mensaje</a>.
        		</div>
			@endif

			@if($message == 'edit')
				<div class="alert alert-success" role="alert">
        		Registro modificado exitosamente <a href="/usuarios" class="alert-link">Click aqui para quitar mensaje</a>.
        		</div>
			@endif
		<div class="row">
			<div class="col-6">
				<h1>Usuarios</h1>
			</div>
		</div>
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i>
				Total de Registros: <b>{{ $users->count() }}</b>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<div class="row">
						<div class="col-4">
							<b>Filtrar por:</b> {!! Form::select('tipo_usuario', $tipo_usuario, null, ['id' => 'tipo_usuario', 'class' => 'form-control', 'placeholder' => 'Seleccione']) !!}
						</div>
						<div class="col-4">
							<br>
							<button class="btn btn-primary" type="submit">Buscar</button>
						</div>
					</div>
					<br>
					<table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
						<thead>
							<tr>
								<th>Nombre de Usuario</th>
								<th>Nombre</th>
								<th>Usuario</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $users)
								<tr>
									<td>
										<a href="{{ route('usuarios/show', ['id' => $users->id]) }}">{{ $users->username }}</a>
									</td>
									<td>{{ $users->name }} {{ $users->ap_paterno }} {{ $users->ap_materno }}</td>
									<td>{{ $users-> tipo_usuario->tipo_usuario }}</td>
									<td>
										<a class="glyphicon glyphicon-pencil" title="Editar" href="{{ route('usuarios/edit', ['id' => $users->id] )}}"><i class="fa fa-fw fa-pencil"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					@if($users->count() == 0)
						<div class="alert alert-danger" role="alert">
							No se han encontrado resultados
						</div>
					@endif
					<div class="col-4">
						<a class="btn btn-primary btn-block" href="usuarios/create">Crear Nuevo</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>
@stop