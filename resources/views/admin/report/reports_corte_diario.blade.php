@extends('layouts.admin')
@section('title', 'Reporte_de_Corte_caja/gestión')
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

@endsection
@section('content')
<div class="content-wrapper">
	@if (session('message'))
		<div class="alert alert-success" role='alert'>
			{{ session('message') }}
		</div>
	@endif
	<div class="page-header">
		<h3 class="page-title">Reporte de Corte de caja por día.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Reporte de corte de caja por día</li>
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
                        <div class="col-12 col-md-3 text-center">
                            <span>Fecha de consulta: <b> </b></span>
                            <div class="form-group">
                                <strong>{{\Carbon\Carbon::now()->format('d/m/Y')}}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-center">
                            <span>Cantidad de registros: <b></b></span>
                            <div class="form-group">
                                <strong>{{ $moves_ingreso->count() + $moves_egreso->count() }}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-center">
                            <span>Total de ingresos: <b> </b></span>
                            <div class="form-group">
                                <strong>$  {{number_format($total_ingreso,2,'.',',')}}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-center">
                            <span>Total de egresos: <b> </b></span>
                            <div class="form-group">
                                <strong>$  {{number_format($total_egreso,2,'.',',')}}</strong>
                            </div>
                        </div>
                    </div>
					{{-- Inicio de tabla-responsive --}}
			      	<div class="table-responsive">
				        <table id="order-listing" class="table">
				        	<thead>
				        		<tr>
				        			<th>Fecha de movimiento</th>
				        			<th>Concepto</th>
				        			<th>Sub-total</th>
				        			<th>Total</th>
				        			{{-- <th style="width: 110px;">Acciones</th> --}}
				        		</tr>
				        	</thead>
				          	<tbody>
				          		<tr>
				          			<td>MOVIMIENTOS DE INGRESO</td>
				          		</tr>
								@foreach ($moves_ingreso as $move_ingreso)
									<tr>
										<th scope="row">
											{{ date('d-m-Y',strtotime($move_ingreso->fecha_mov)) }}
											{{ $move_ingreso->fecha_mov }}
										</th>
										<td>
											{{ $move_ingreso->detalle }}
										</td>
										<td>$  {{ number_format($move_ingreso->importe,2,'.',',') }} </td>
									</tr>
								@endforeach
									<tr>
				                        <th colspan="3">
				                            <p align="right">TOTAL INGRESOS:</p>
				                        </th>
				                        <td>
				                            <p align="left">$  {{number_format($total_ingreso,2,'.',',')}}<p>
				                        </td>
				                    </tr>
				                <tr>
				          			<td>MOVIMIENTOS DE EGRESOS</td>
				          		</tr>
								@foreach ($moves_egreso as $move_egreso)
									<tr>
										<th scope="row">
											{{ date('d-m-Y',strtotime($move_egreso->fecha_mov)) }}
											{{ $move_egreso->fecha_mov }}
										</th>
										<td>
											{{ $move_egreso->detalle }}
										</td>
										<td>$  {{ number_format($move_egreso->importe,2,'.',',') }} </td>
									</tr>
								@endforeach
									<tr>
				                        <th colspan="3">
				                            <p align="right">TOTAL EGRESOS:</p>
				                        </th>
				                        <td>
				                            <p align="left">$  {{number_format($total_egreso,2,'.',',')}}<p>
				                        </td>
				                    </tr>
			          		</tbody>
			          		<tfoot>
			          			<tr>
				                        <th colspan="3">
				                            <p align="right">SALDO:</p>
				                        </th>
				                        <td>
				                            <p align="left">
				                            	$ {{number_format($total_ingreso-$total_egreso,2,'.',',')}}
				                            <p>
				                        </td>
				                    </tr>
			          		</tfoot>
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