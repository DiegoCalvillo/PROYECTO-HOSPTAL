@extends('layouts.principal')

@section('content_tipo_usuarios')
<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item active">Tipos de Usuarios</li>
		</ol>
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
										<a class="glyphicon glyphicon-pencil" href="{{ route('tipo_usuarios/edit', ['id' => $tipos_usuarios->id] )}}"> Editar</a>
									</td>								
								</tr>
							@endforeach
						</tbody>
					</table>
					<div class="col-4">
						<a class="btn btn-primary btn-block" href="tipo_usuarios/create">Crear Nuevo</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop