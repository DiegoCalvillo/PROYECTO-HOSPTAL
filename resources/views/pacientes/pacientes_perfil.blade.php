@extends('layouts.principal')

@section('content_pacientes_perfil')
<div class="content-wrapper">
	<div class="container-fluid">
		<form>
		{!! Form::hidden('id', $paciente->id) !!}
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">{{ $paciente->nombre_paciente }} {{ $paciente->ap_paterno }} {{ $paciente->ap_materno }}</h1>
				</div>
			</div>
		</form>
	</div>
</div>
@stop