@extends('layouts.admin')
@section('title', 'Cajas/gestión')
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
	@can('boxes.create')
		<li class="nav-item d-note d-lg-flex">
			<a class="btn btn-primary" href="{{ route('boxes.create') }}">+Crear nueva.</a>
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
		<h3 class="page-title">Gestión de Cajas.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Cajas</li>
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
                        <h4 class="card-title">Cajas</h4>
                        <div class="btn-group">
						  @can('boxes.pdfBoxes')
						  	<a href="{{ route('boxes.pdfBoxes') }}" title="Exportar PDF">
							  	<span style="font-size: 20px;" class="me-2"><i class="far fa-file-pdf"></i></span>
							</a>
						  @endcan
						  @can('boxes.export')
						  	<a href="{{ route('boxes.export') }}" title="Exportar Excel">
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
				        			<th>Usuario</th>
				        			<th>Saldo</th>
				        			<th>Acciones</th>
				        		</tr>
				        	</thead>
				          	<tbody>
								@foreach ($boxes as $box)
									<tr>
										<th scope="row">{{ $box->id }}</th>
										<td> {{ $box->name  }} </td>
										<td> {{ $box->user->name }} </td>
										<td> {{ $box->user->saldo }} </td>
										<td style="width: 50px;">
											{!! Form::open(['route' => ['boxes.destroy', $box], 'method'=> 'delete']) !!}
												@can('boxes.show')
													{{-- <a class="jsgrid-button jsgrid-edit-button" href="{{ route('boxes.show', $box) }}" title="Detalles del cliente"><i class="far fa-eye"></i></a> --}}
												@endcan
												@can('boxes.edit')
													<a class="jsgrid-button jsgrid-edit-button" href="{{ route('boxes.edit', $box) }}" title="Editar">
													<i class="far fa-edit"></i>
												</a>
												@endcan

												@can('boxes.destroy')
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