@extends('layouts.principal')

@section('content_usuarios_perfil')
<div class="content-wrapper">
	{!! Form::open(['route' => 'usuarios/cambiar_foto', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
	{!! Form::hidden('id', $user->id) !!}
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/usuarios">Usuarios</a>
			</li>
			<li class="breadcrumb-item active">
				{{ $user->name }} {{ $user->ap_paterno }} {{ $user->ap_materno }}
			</li>
		</ol>
		<form>
			{!! Form::hidden('id', $user->id) !!}
			<div class="row">
				<div class="col-7">
					<h3>Información General</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
								<tbody>
									<tr>
										<th>Nombre de Usuario</th>
										<td>{{ $user->username }}</td>
									</tr>
									<tr>
										<th>Nombre</th>
										<td>{{ $user->name }}</td>
									</tr>
									<tr>
										<th>Apellidos</th>
										<td>{{ $user->ap_paterno }} {{ $user->ap_materno }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-6">
					<img class="rounded-circle img-fluid d-block mx-auto" width="40%" src="{!! asset($user->ruta_foto_perfil) !!}">
					@if(Auth::User()->id == $user->id)
						<input size="20" type="file" class="form-control" name="file" id="file">
						<button type="submit" class="btn btn-primary">Cambiar foto</button>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<h3>Contacto</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
								<tbody>
									<tr>
										<th>Correo electrónico</th>
										<td>{{ $user->email }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<h3>Login</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
								<tbody>
									<tr>
										<th>Usuario</th>
										<td>{{ $user->username }}</td>
									</tr>
									<tr>
										<th>Tipo de Usuario</th>
										<td>{{ $user->tipo_usuario->tipo_usuario }}</td>
									</tr>
									<tr>
										<th>Estatus de Cuenta</th>
										@if($user->estatus_usuario_id == 0)
											<td><font color="red"><b>{{ $user->estatus->nombre_estatus }}</b></font></td>
										@else
											<td><font color="green"><b>{{ $user->estatus->nombre_estatus }}</b></font></td>
										@endif
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@stop