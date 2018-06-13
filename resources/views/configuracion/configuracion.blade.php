@extends('layouts.principal')

@section('content_configuracion')
<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url('/') }}">Inicio</a>
			</li>
			<li class="breadcrumb-item active">Configuración</li>
		</ol>
		<div class="row">
			<div class="col-4">
				<h5>Login</h5>
				<hr>
				@foreach($config as $config)
					<a href="{{ route('configuracion/edit', ['id' => $config->id]) }}">{{ $config->nombre_configuracion }}</a>
					<br>
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop