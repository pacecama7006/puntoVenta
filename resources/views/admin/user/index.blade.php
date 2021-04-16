@extends('layouts.admin')
@section('title', 'Usuarios/gestión')
@section('estilos')
	<style type="text/css">
		.unstyled-button{
			border: none;
			padding: 0;
			background: none;
		}
	</style>
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('create')
	@can('users.create')
		<li class="nav-item d-note d-lg-flex">
			<a class="btn btn-primary" href="{{ route('users.create') }}">+Crear nuevo.</a>
		</li>
	@endcan
@endsection
@section('content')
<div class="content-wrapper">
	@if (session('message'))
		<div class="alert alert-success" role='alert'>
			{{ session('message') }}
		</div>
	@endif
	<div class="page-header">
		<h3 class="page-title">Gestión de Usuarios.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Usuarios</li>
			</ol>
		</nav>
	</div>
	{{-- Inicio de fila --}}
	<div class="row">
		{{-- Inicio de columna --}}
		<div class="col-12 grid-margin stretch-card">
			{{-- Inicio de card --}}
		  	<div class="card">
		  		{{-- Inicio card-body --}}
			    <div class="card-body">
					<div class="d-flex justify-content-between">
                        <h4 class="card-title">Usuarios</h4>
                        <div class="btn-group">
						  @can('users.pdfUsers')
						  	<a href="{{ route('users.pdfUsers') }}" title="Exportar PDF">
							  	<span style="font-size: 20px;" class="me-2"><i class="far fa-file-pdf"></i></span>
							</a>
						  @endcan
						  @can('users.export')
						  	<a href="{{ route('users.export') }} " title="Exportar Excel">
							  	<span style="font-size: 20px;"><i class="fas fa-file-excel"></i></span>
							</a>
						 @endcan
						</div>
                    </div>
					{{-- Inicio de tabla-responsive --}}
			      	<div class="table-responsive">
				        <table id="order-listing" class="table">
				        	<thead>
				        		<tr>
				        			<th>Id</th>
				        			<th>Nombre</th>
				        			<th>Correo </th>
				        			<th>Acciones</th>
				        		</tr>
				        	</thead>
				          	<tbody>
								@foreach ($users as $user)
									<tr>
										<th scope="row">{{ $user->id }}</th>
										<td>
											{{ $user->name }}
										</td>
										<td> {{ $user->email }} </td>
										<td style="width: 50px;">
											{!! Form::open(['route' => ['users.destroy', $user], 'method'=> 'delete']) !!}

												@can('users.show')
													<a class="jsgrid-button jsgrid-edit-button" href="{{ route('users.show', $user) }}" title="Detalles del cliente"><i class="far fa-eye"></i></a>
												@endcan

												@can('users.edit')
													@if ($user->id == 1)
														<a class="jsgrid-button jsgrid-edit-button" href="{{ route('users.index') }}" title="Editar">
															<i class="far fa-edit"></i>
														</a>
													@else
														<a class="jsgrid-button jsgrid-edit-button" href="{{ route('users.edit', $user) }}" title="Editar">
															<i class="far fa-edit"></i>
														</a>
													@endif
												@endcan

												@can('users.destroy')
													<button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
													<i class="far fa-trash-alt"></i>
												</button>
												@endcan
											{!! Form::close() !!}
										</td>
									</tr>
								@endforeach
			          		</tbody>
			        	</table>
			      	{{-- Fin de tabla responsive --}}
			      	</div>
			    {{-- fin card-body --}}
				</div>
			{{-- fin card --}}
		  	</div>
		{{-- fin columna --}}
		</div>
	{{-- Fin fila --}}
	</div>
</div>
@endsection
@section('js')
	<script type="text/javascript" src="{{ asset('melody/js/data-table.js') }}"></script>
@endsection