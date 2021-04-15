@extends('layouts.admin')
@section('title', 'Ventas/gestión')
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
	@can('sales.create')
		<li class="nav-item d-note d-lg-flex">
			<a class="btn btn-primary" href="{{ route('sales.create') }}">+Crear nuevo.</a>
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
		<h3 class="page-title">Gestión de Ventas.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Ventas</li>
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
                        <h4 class="card-title">Ventas</h4>
                        <div class="btn-group">
						  @can('sales.pdfSales')
						  	<a href="{{ route('sales.pdfSales') }}" title="Exportar PDF">
							  	<span style="font-size: 20px;" class="me-2"><i class="far fa-file-pdf"></i></span>
							</a>
						@endcan
						@can('sales.export')
						  	<a href="{{ route('sales.export') }} " title="Exportar Excel">
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
				        			<th># de venta</th>
				        			<th>Fecha de venta</th>
				        			<th>Cliente</th>
				        			<th>Total</th>
				        			<th>Estado</th>
				        			<th style="width: 110px;">Acciones</th>
				        		</tr>
				        	</thead>
				          	<tbody>
								@foreach ($sales as $sale)
									<tr>
										<th scope="row">
											{{ $sale->id }}
										</th>
										<td>
											{{$sale->num_vta }}
										</td>
										<td>
											{{ date('d-m-Y', strtotime($sale->sale_date)) }}
										</td>
										<td> {{$sale->client->name }} </td>
										<td>$ {{ number_format($sale->total,2,'.',',') }} </td>
										@if ($sale->status == 'VALID')
											<td>
		                                        @can('sales.status')
		                                        	<a class="jsgrid-button btn btn-success" href="{{route('sales.status', $sale)}}" title="Editar">
		                                            Activo <i class="fas fa-check"></i>
		                                        </a>
		                                        @endcan
		                                    </td>
										@else
											<td>
		                                        @can('sales.status')
		                                        	<a class="jsgrid-button btn btn-danger" href="{{route('sales.status', $sale)}}" title="Editar">
		                                            Cancelado <i class="fas fa-times"></i>
		                                        </a>
		                                        @endcan
		                                    </td>
										@endif
										<td style="width: 110px;">
											@can('sales.show')
												<a class="jsgrid-button jsgrid-edit-button" href="{{ route('sales.show', $sale) }}" title="Detalles"><i class="far fa-eye"></i></a>
											@endcan
											@can('sales.pdf_detalle')
												<a class="jsgrid-button jsgrid-edit-button" href="{{ route('sales.pdf_detalle', $sale) }}" title="Exportar Pdf"><i class="far fa-file-pdf"></i></a>
											@endcan
											@can('sales.excel_detalle')
												<a class="jsgrid-button jsgrid-edit-button" href="{{ route('sales.excel_detalle', $sale) }}" title="Exportar Excel"><i class="fas fa-file-excel"></i></a>
											@endcan
											@can('sales.print')
												<a class="jsgrid-button jsgrid-edit-button" href="{{ route('sales.print', $sale) }}" title="Imprimir"><i class="fas fa-print"></i></a>
											@endcan
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