@extends('layouts.principal')

@section('content_pacientes_perfil')
<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="/pacientes">Pacientes</a>
			</li>
			<li class="breadcrumb-item active">
				{{ $paciente->nombre_paciente }} {{ $paciente->ap_paterno }} {{ $paciente->ap_materno }}
			</li>
		</ol>
		<form>
		{!! Form::hidden('id', $paciente->id) !!}
			<div class="row">
				<div class="col-6">
					<h3>Información General</h3>
				</div>
				<div class="col-6">
					<h3>Dirección</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="card-body">
						<div class="table-resposive">
							<table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
								<tbody>
									<tr>
										<th>ID Asignado por el sistema</th>
										<td>{{ $paciente->id }}</td>
									</tr>
									<tr>
										<th>Genero</th>
										@if($paciente->genero_paciente == 2)
											<td>Femenino</td>
										@else
											<td>Masculino</td>
										@endif
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="card-body">
						<div class="table-resposive">
							<table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
								<tbody>
									<tr>
										<th>Estado</th>
										<td>{{ $paciente->estados->nombre_estado }}</td>
									</tr>
									<tr>
										<th>Municipio</th>
										<td>{{ $paciente->municipios->nombre_municipio }}</td>
									</tr>
									<tr>
										<th>Colonia</th>
										<td>{{ $paciente->colonia_paciente }}</td>
									</tr>
									<tr>
										<th>Código Postal</th>
										@if(!empty($paciente->numero_postal_paciente))
											<td>{{ $paciente->numero_postal_paciente }}</td>
										@else
											<td>Sin Registro</td>
										@endif
									</tr>
									<tr>
										<th>Calle y Número</th>
										<td>{{ $paciente->calle_paciente }} {{ $paciente->numero_casa_paciente }}</td>
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