@extends('layouts.admin')
@section('title', 'Reporte_de_compras/gestión')
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
{{-- 	<li class="nav-item d-note d-lg-flex">
		<a class="btn btn-primary" href="{{ route('sales.create') }}">+Crear nuevo.</a>
	</li> --}}
@endsection
@section('content')
<div class="content-wrapper">
	@if (session('message'))
		<div class="alert alert-success" role='alert'>
			{{ session('message') }}
		</div>
	@endif
	<div class="page-header">
		<h3 class="page-title">Reporte de Compras por día.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Reporte de compras por día</li>
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
                        {{--  <h4 class="card-title">Reporte de ventas</h4>
                        <div class="btn-group">
						  <a href="#">
						  	<i class="fas fa-download"></i>
						  	Exportar
						  </a>
						</div> --}}
                    </div>
                    <div class="row ">
                        <div class="col-12 col-md-4 text-center">
                            <span>Fecha de consulta: <b> </b></span>
                            <div class="form-group">
                                <strong>{{\Carbon\Carbon::now()->format('d/m/Y')}}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center">
                            <span>Cantidad de registros: <b></b></span>
                            <div class="form-group">
                                <strong>{{$purchases->count()}}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center">
                            <span>Total de egresos: <b> </b></span>
                            <div class="form-group">
                                <strong>$  {{number_format($total,2,'.',',')}}</strong>
                            </div>
                        </div>
                    </div>
					{{-- Inicio de tabla-responsive --}}
			      	<div class="table-responsive">
				        <table id="order-listing" class="table">
				        	<thead>
				        		<tr>
				        			<th>Id</th>
				        			<th>Número de compra</th>
				        			<th>Fecha de compra</th>
				        			<th>Total</th>
				        			<th>Estado</th>
				        			<th style="width: 110px;">Acciones</th>
				        		</tr>
				        	</thead>
				          	<tbody>
								@foreach ($purchases as $purchase)
									<tr>
										<th scope="row">
											{{ $purchase->id }}
										</th>
										<td> {{ $purchase->num_compra }} </td>
										<td>
											{{ date('d-m-Y',strtotime($purchase->purchase_date)) }}
										</td>
										<td>$  {{ number_format($purchase->total,2,'.',',') }} </td>
										<td> {{ $purchase->status }} </td>
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