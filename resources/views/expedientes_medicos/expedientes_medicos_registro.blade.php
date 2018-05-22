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
			<form>
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
				</div>
			</form>
		</div>
	</div>
</div>
@stop