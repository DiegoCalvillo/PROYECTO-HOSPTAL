@extends('layouts.principal')

@section('content_expediente_medico')
<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/pacientes">Pacientes</a>
			</li>
			<li class="breadcrumb-item active">
				{{ $paciente->nombre_paciente }} {{ $paciente->ap_paterno }} {{ $paciente->ap_materno }}
			</li>
		</ol>
		<div class="container">
			<form method="POST" action="http://192.168.1.71:8080/expediente/store">
			{{ Form::hidden('id', $paciente->id) }}
				<div class="card-header">
					<b>Datos de Consultorio</b>
				</div>
				<div class="card-body">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-4">
								{{ Form::label('full_name', 'Médico') }}
								{{ Form::select('medico', $medico, null, ['id' => 'medico', 'class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								{{ Form::label('full_name', 'Estatura') }}
								{{ Form::text('estatura', null, ['class' => 'form-control']) }}
							</div>  
							<div class="col-md-6">
								{{ Form::label('full_name', 'Peso') }}
								{{ Form::text('peso', null, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								{{ Form::label('full_name', 'Padecimiento') }}
								{{ Form::select('padecimiento', $padecimiento, null, ['class' => 'form-control', 'placeholder' => 'Seleccione']) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12">
								{{ Form::label('full_name', 'Observaciones') }}
								{{ Form::textarea('observaciones', null, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
				</div>
				<button class="btn btn-primary" type="submit">Guardar</button>
			</form>
		</div>
	</div>
</div>
@stop