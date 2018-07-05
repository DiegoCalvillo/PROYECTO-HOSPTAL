@extends('layouts.principal')

@section('content_configuracion_perfil')
<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ url('/') }}">Inicio</a>
			</li>
			<li class="breadcrumb-item">
				<a href="{{ url('/configuracion') }}">Configuración</a>
			</li>
			<li class="breadcrumb-item active">
				{{ $config->nombre_configuracion }}
			</li>
		</ol>
		<form>
			<?php $message=Session::get('message') ?>
				@if($message == 'edit')
					<div class="alert alert-success" role="alert">
        				Registro modificado exitosamente 
        			</div>	
				@endif
			<div class="row">
				<div class="col-6">
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
										<th>Nombre</th>
										<th>Valor</th>
										<th>Estatus</th>
										<th>Editar</th>
									</tr>
									<tr>
										<td>{{ $config->nombre_configuracion }}</td>
										<td>{{ $config->valor }}</td>
										@if($config->estatus_id == 0)
											<td><font color="red"><b>{{ $config->estatus->nombre_estatus }}</b></font></td>
										@else
											<td><font color="green"><b>{{ $config->estatus->nombre_estatus }}</b></font></td>
										@endif
										<td><a class="glyphicon glyphicon-percil" title="Editar" href="{{ route('configuracion/edit', ['id' => $config->id]) }}"><i class="fa fa-fw fa-pencil"></i></a></td>
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