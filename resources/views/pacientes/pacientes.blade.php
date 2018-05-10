@extends('layouts.principal')

@section('content_pacientes')
<div class="content-wrapper">
	<?php $message = Session::get('message') ?>
	@if($message == 'store')
		<div class="alert alert-success" role="alert">
        Registro creado exitosamente <a href="/pacientes" class="alert-link">Click aqui para quitar mensaje</a>.
        </div>
	@endif

	@if($message == 'edit')
		<div class="alert alert-success" role="alert">
        Registro modificado exitosamente <a href="/pacientes" class="alert-link">Click aqui para quitar mensaje</a>.
        </div>
	@endif
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
				<li class="breadcrumb-item active">Pacientes</li>
			</li>
		</ol>
		<div class="row">
			<div class="col-6">
				<h1>Pacientes</h1>
			</div>
		</div>
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i>
				Total de Registros: <b>{{ $paciente->count() }}</b>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Apellidos</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($paciente as $paciente)
								<tr>
									<td>
										<a href="{{ route('pacientes/show', ['id' => $paciente->id]) }}">{{ $paciente->nombre_paciente }}</a>
									</td>
									<td>{{ $paciente->ap_paterno }} {{ $paciente->ap_materno }}</td>
									<td>
										<a class="glyphicon glyphicon-pencil" title="Editar" href="{{ route('pacientes/edit', ['id' => $paciente->id] )}}"><i class="fa fa-fw fa-pencil"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@stop