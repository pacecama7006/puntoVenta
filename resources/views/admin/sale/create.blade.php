@extends('layouts.admin')
@section('title', 'Ventas/registrar')
@section('estilos')
	<link rel="stylesheet" type="text/css" href="{{ asset('select2-develop/dist/css/select2.min.css') }}">
	<style type="text/css">
	.select2-container .select2-selection--single {
	    box-sizing: border-box;
	    cursor: pointer;
	    display: block;
	    /*height: 28px;*/
	    padding-top: 2px;
	    height: 35px;
	    user-select: none;
	    -webkit-user-select: none;
	}
	</style>
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Registrar venta.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
				<li class="breadcrumb-item active" aria-current="page">Registrar venta.</li>
			</ol>
		</nav>
	</div>
	{{-- Inicio de fila --}}
	<div class="row">
		{{-- Inicio de columna --}}
		<div class="col-12 grid-margin stretch-card">
			{{-- Inicio de card --}}
		  	<div class="card">
			    <div class="card-body">
					<div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de venta.</h4>
                    </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'sales.store', 'class' => 'row g-3', 'id' =>'form_sale']) !!}

	                    	@include('admin.sale.partials.form')

				    {{-- fin card-body --}}
				</div>
				<div class="card-footer">
					@can('sales.create')
						<div class="btn-group me-2" role="group" aria-label="Reset y agregar">
					        {!! Form::reset("Borrar contenido", ['class' => 'btn btn-warning']) !!}
					        {!! Form::submit("Agregar", ['class' => 'btn btn-primary', 'id' => 'guardar']) !!}
					    </div>
					@endcan
				    <a class="btn btn-light" href="{{ route('sales.index') }}">Cancelar</a>
				</div>
				{!! Form::close() !!}
			{{-- fin card --}}
		  	</div>
		{{-- fin columna --}}
		</div>
	{{-- Fin fila --}}
	</div>
</div>
@endsection
@section('js')
	{{-- <script type="text/javascript" src="{{ asset('melody/js/data-table.js') }}"></script> --}}
	<!-- Custom js for this page-->
	{{-- <script src="{{ asset('melody/js/alerts.js') }}"></script>
	<script src="{{ asset('melody/js/avgrund.js') }}"></script> --}}
	<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
	{{-- <script src="{{ asset('js/detalleVenta.js') }}"></script> --}}
	<script src="{{ asset('js/NvodetalleVenta.js') }}"></script>
	<script type="text/javascript" src="{{ asset('select2-develop/dist/js/select2.min.js') }}"></script>
@endsection