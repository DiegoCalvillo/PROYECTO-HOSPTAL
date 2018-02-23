@extends('layouts.principal')

@section('content_usuarios')
<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Inicio</a>
			</li>
			<li class="breadcrumb-item active">Usuarios</li>
		</ol>
		<div class="row">
			<div class="col-12">
				<h1>Usuarios</h1>
			</div>
		</div>
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i>
				Registros
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellpadding="0">
						<thead>
							<tr>
								<th>Nombre de Usuario</th>
								<th>Nombre</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $users)
								<tr>
									<td>{{ $users->username }}</td>
									<td>{{ $users->name }}</td>
									<td></td>
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