@extends('layouts.principal')

@section('content_usuarios_registro')
<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/usuarios">Usuarios</a>
			</li>
			<li class="breadcrumb-item active">Registro de Usuarios</li>
		</ol>
		<div class="container">
			<form method="POST" action="http://192.168.1.66:8080/usuarios/store">
				<div class="card card-register mx-auto mt-5">
					<div class="card-header">
						Información General
					</div>
					<div class="card-body">
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label for="exampleInputName">Nombre</label>
									<input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="name" placeholder="Nombre">
								</div>
								<div class="col-md-4">
									<label for="exampleInputName">Primer Apellido</label>
									<input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="ap_paterno" placeholder="Apellido paterno">
								</div>
								<div class="col-md-4">
									<label for="exampleInputName">Segundo Apellido</label>
									<input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="ap_materno" placeholder="Apellido materno">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<label for="exampleInputName">Correo electrónico</label>
									<input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" name="email" placeholder="Enter email">
								</div>
								<div class="col-md-6">
									<label for="exampleInputName">Tipo de Usuario</label>
									<select class="form-control" name="tipo_usuario">
										<option value="">Seleccione</option>
										<?php foreach($tipo_usuario as $tipo_usuario){
											echo '<option value="'.$tipo_usuario['id'].'">'.$tipo_usuario['tipo_usuario'].'</option>';
										}?>
									</select>
								</div>
								<div class="col-md-6">
									<label for="exampleInputName">Estatus del Usuario</label>
									<select class="form-control" name="estatus_usuario">
										<option value="">Seleccione</option>
										<?php foreach($estatus_usuario as $estatus_usuario){
											echo '<option value="'.$estatus_usuario['id'].'">'.$estatus_usuario['estatus_usaurio'].'</option>';
										}?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="card-header">
						Credenciales de Usuario
					</div>
					<div class="card-body">
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<label for="exampleInputName">Nombre de usuario</label>
									<input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="username" placeholder="Nombre de Usuario">
								</div>
								<div class="col-md-6">
									<label for="exampleInputName">Contraseña</label>
									<input class="form-control" id="exampleInputName" type="password" aria-describedby="nameHelp" name="password">
								</div>
								<div class="col-md-6">
									<label for="exampleInputName">Confirmar Contraseña</label>
									<input class="form-control" id="exampleInputName" type="password" aria-describedby="nameHelp" name="password2">
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-primary" type="submit">Registrar Usuario</button>
				</div>
			</form>
		</div>
	</div>
	<br>
</div>
@stop