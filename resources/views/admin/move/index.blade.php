@extends('layouts.admin')
@section('title', 'Movimientos/gestión')
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
	@can('moves.create')
		<li class="nav-item d-note d-lg-flex">
			<a class="btn btn-primary" href="{{ route('moves.create') }}">+Crear nuevo.</a>
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
		<h3 class="page-title">Gestión de Movimientos.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Movimientos</li>
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
                        <h4 class="card-title">Movimientos</h4>
                        <div class="btn-group">
						  @can('moves.pdfBoxes')
						  	<a href="{{ route('moves.pdfMoves') }}" title="Exportar PDF">
							  	<span style="font-size: 20px;" class="me-2"><i class="far fa-file-pdf"></i></span>
							</a>
						  @endcan
						  @can('moves.export')
						  	<a href="{{ route('moves.export') }}" title="Exportar Excel">
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
				        			<th>Fecha de movimiento</th>
				        			<th>Tipo de movimiento</th>
				        			<th>Concepto</th>
				        			<th>Importe</th>
				        			<th>Conciliado</th>
				        			<th>Acciones</th>
				        		</tr>
				        	</thead>
				          	<tbody>
								@foreach ($moves as $move)
									<tr>
										<th>{{ date('d-m-Y', strtotime($move->fecha_mov)) }}</th>
										<td> {{ $move->tipo }} </td>
										<td> {{ $move->concept->concepto }} </td>
										<td> {{ number_format($move->importe,2,'.',',') }} </td>
										<td>
											@can('moves.conciliado')
												@if ($move->conciliado == 0)
												<a href="{{ route('moves.conciliado', $move) }}" class="btn btn-danger btn-sm">No conciliado</a>
											@else
												<a href="{{ route('moves.conciliado', $move) }}" class="btn btn-success btn-sm">Conciliado</a>
											@endif
											@endcan
										</td>

										<td style="width: 50px;">
											{!! Form::open(['route' => ['moves.destroy', $move], 'method'=> 'delete']) !!}
												@can('moves.show')
													<a class="jsgrid-button jsgrid-edit-button" href="{{ route('moves.show', $move) }}" title="Detalles del movimiento"><i class="far fa-eye"></i></a>
												@endcan
												@can('moves.edit')
													<a class="jsgrid-button jsgrid-edit-button" href="{{ route('moves.edit', $move) }}" title="Editar">
													<i class="far fa-edit"></i>
												</a>
												@endcan

												@can('moves.destroy')
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