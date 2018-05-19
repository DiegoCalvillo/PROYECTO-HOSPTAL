@extends('layouts.principal')

@section('content_medicos')
<div class="content-wrapper">
	<form>
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="/">Inicio</a>
				</li>
				<li class="breadcrumb-item active">Médicos</li>
			</ol>
			<div class="row">
				<div class="col-6">
					<h1>Médicos</h1>
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i>
					Total de Registros: <b>{{ $medico->count() }}</b>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Apellidos</th>
								</tr>
							</thead>
							<tbody>
								@foreach($medico as $medico)
									<tr>
										<td>{{ $medico->id }}</td>
										<td>{{ $medico->name }}</td>
										<td>{{ $medico->ap_paterno }} {{ $medico->ap_materno }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@stop