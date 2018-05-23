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
				<b>{{ $paciente->nombre_paciente }} {{ $paciente->ap_paterno }} {{ $paciente->ap_materno }}</b>
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
			<div class="row">
				<div class="col-6">
					<h3>Historial Médico</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="card-body">
						<div class="table-resposive">
							<table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
								<tbody>
									<tr>
										<th>Médico que lo atiende</th>
										@if(!empty($paciente->medico_id))
											<td>{{ $paciente->medico->name }}</td>
										@else
											<td>Sin Registro</td>
										@endif
									</tr>
								</tbody>
							</table>
							@if(empty($paciente->expediente))
								<div class="col-6">
									<a class="btn btn-primary btn-block" href="{{ route('expediente/create', ['id' => $paciente->id]) }}">Crear expediente médico</a>
								</div>
							@else
								<table class="table table-bordered" id="dataTable" width="100%", cellpadding="0">
									<tbody>
										<tr>
											<th>Estatura</th>
											<td>{{ $expediente->estatura }}</td>
											<th>Peso</th>
											<td>{{ $expediente->peso }}</td>
										</tr>
									</tbody>
								</table>
							@endif
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@stop