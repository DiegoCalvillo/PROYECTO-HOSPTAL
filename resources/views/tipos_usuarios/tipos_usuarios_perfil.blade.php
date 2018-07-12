@extends('layouts.principal')

@section('content_tipo_usuarios_perfil')
<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/tipo_usuarios">Tipos de Usuarios</a>
			</li>
			<li class="breadcrumb-item active">
				{{ $tipo_usuario->tipo_usuario }}
			</li>
		</ol>
		<form>
			{!! Form::hidden('id', $tipo_usuario->id) !!}
			<div class="row">
				<div class="col-6">
					<h3>Información General</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="container">
						<div class="card-header">
							<b>Información General</b>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="dataTable" width="100%" cellpadding="0">
									<tbody>
										<tr>
											<th>ID asignado por el sistema</th>
											<td>{{ $tipo_usuario->id }}</td>
										</tr>
										<tr>
											<th>Tipo de Usuario</th>
											<td>{{ $tipo_usuario->tipo_usuario }}</td>
										</tr>
										<tr>
											<th>Estatus</th>
											@if($tipo_usuario->estatus_id == 0)
												<td><font color="red"><b>{{ $tipo_usuario->estatus->nombre_estatus }}</b></font></td>
											@else
												<td>{{ $tipo_usuario->estatus->nombre_estatus }}</td>
											@endif
										</tr>
										<tr>
											<th>Clave</th>
											<td>{{ $tipo_usuario->clave }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@stop