@extends('layouts.admin')
@section('title', 'Compras/gestión')
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
	@can('purchases.create')
		<li class="nav-item d-note d-lg-flex">
			<a class="btn btn-primary" href="{{ route('purchases.create') }}">+Crear nueva.</a>
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
		<h3 class="page-title">Gestión de Compras.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				@if (Auth::user()->hasAnyRole('SuperAdmin','Administrador'))
					<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				@else
					<li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
				@endif
				<li class="breadcrumb-item active" aria-current="page">Compras</li>
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
                        <h4 class="card-title">Compras</h4>
                        <div class="btn-group">
						  @can('purchases.pdfPurchases')
						  	<a href="{{ route('purchases.pdfPurchases') }}" title="Exportar PDF">
							  	<span style="font-size: 20px;" class="me-2"><i class="far fa-file-pdf"></i></span>
							</a>
						  @endcan
						  @can('purchases.export')
						  	<a href="{{ route('purchases.export') }} " title="Exportar Excel">
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
				        			<th># de compra</th>
				        			<th>Fecha de compra</th>
				        			<th>Comprador</th>
				        			<th>Total</th>
				        			<th>Estado</th>
				        			<th style="width: 110px;">Acciones</th>
				        		</tr>
				        	</thead>
				          	<tbody>
								@if (Auth::user()->hasAnyRole('SuperAdmin', 'Administrador'))
									@foreach ($purchases as $purchase)
										<tr>
											<th scope="row">
												{{ $purchase->num_compra }}
											</th>
											<td>
												{{ date('d-m-Y',strtotime($purchase->purchase_date)) }}
											</td>
											<td> {{ $purchase->user->name }} </td>
											<td> $ {{ number_format($purchase->total,2,'.',',') }} </td>
											@if ($purchase->status == 'VALID')
												<td>
			                                        @can('purchases.status')
			                                        	<a class="jsgrid-button btn btn-success" href="{{route('purchases.status', $purchase)}}" title="Editar">
			                                            Activo <i class="fas fa-check"></i>
			                                        </a>
			                                        @endcan
			                                    </td>
											@else
												<td>
			                                        @can('purchases.status')
			                                        	<a class="jsgrid-button btn btn-danger" href="{{route('purchases.status', $purchase)}}" title="Editar">
			                                            Cancelado <i class="fas fa-times"></i>
			                                        </a>
			                                        @endcan
			                                    </td>
											@endif
											<td style="width: 110px;">
													@can('purchases.show')
														<a class="jsgrid-button jsgrid-edit-button" href="{{ route('purchases.show', $purchase) }}" title="Detalles"><i class="far fa-eye"></i></a>
													@endcan
													@can('purchases.pdf_detalle')
														<a class="jsgrid-button jsgrid-edit-button" href="{{ route('purchases.pdf_detalle', $purchase) }}" title="Exportar Pdf"><i class="far fa-file-pdf"></i></a>
													@endcan
													@can('purchases.excel_detalle')
														<a class="jsgrid-button jsgrid-edit-button" href="{{ route('purchases.excel_detalle', $purchase) }}" title="Exportar Excel"><i class="fas fa-file-excel"></i></a>
													@endcan
													{{-- @can('purchases.print') --}}
														<a class="jsgrid-button jsgrid-edit-button" href="{{ route('purchases.print', $purchase) }}" title="Imprimir"><i class="fas fa-print"></i></a>
													{{-- @endcan --}}
											</td>
										</tr>
									@endforeach
								@else
									@foreach ($purchases_com as $purchase)
										<tr>
											<th scope="row">
												{{ $purchase->num_compra }}
											</th>
											<td>
												{{ date('d-m-Y',strtotime($purchase->purchase_date)) }}
											</td>
											<td> {{ $purchase->user->name }} </td>
											<td> $ {{ number_format($purchase->total,2,'.',',') }} </td>
											@if ($purchase->status == 'VALID')
												<td>
			                                        @can('purchases.status')
			                                        	<a class="jsgrid-button btn btn-success" href="{{route('purchases.status', $purchase)}}" title="Editar">
			                                            Activo <i class="fas fa-check"></i>
			                                        </a>
			                                        @endcan
			                                    </td>
											@else
												<td>
			                                        @can('purchases.status')
			                                        	<a class="jsgrid-button btn btn-danger" href="{{route('purchases.status', $purchase)}}" title="Editar">
			                                            Cancelado <i class="fas fa-times"></i>
			                                        </a>
			                                        @endcan
			                                    </td>
											@endif
											<td style="width: 110px;">
													@can('purchases.show')
														<a class="jsgrid-button jsgrid-edit-button" href="{{ route('purchases.show', $purchase) }}" title="Detalles"><i class="far fa-eye"></i></a>
													@endcan
													@can('purchases.pdf_detalle')
														<a class="jsgrid-button jsgrid-edit-button" href="{{ route('purchases.pdf_detalle', $purchase) }}" title="Exportar Pdf"><i class="far fa-file-pdf"></i></a>
													@endcan
													@can('purchases.excel_detalle')
														<a class="jsgrid-button jsgrid-edit-button" href="{{ route('purchases.excel_detalle', $purchase) }}" title="Exportar Excel"><i class="fas fa-file-excel"></i></a>
													@endcan
													{{-- @can('purchases.print') --}}
														<a class="jsgrid-button jsgrid-edit-button" href="{{ route('purchases.print', $purchase) }}" title="Imprimir"><i class="fas fa-print"></i></a>
													{{-- @endcan --}}
											</td>
										</tr>
									@endforeach
								@endif
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