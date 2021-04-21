@extends('layouts.admin')
@section('title', 'Compras/registrar')
@section('estilos')
	{{-- expr --}}
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Registrar compra.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Compras</a></li>
				<li class="breadcrumb-item active" aria-current="page">Registrar compra.</li>
			</ol>
		</nav>
	</div>
	{{-- Inicio de fila --}}
	<div class="row">
		{{-- Inicio de columna --}}
		<div class="col-12 grid-margin stretch-card">
			{{-- Inicio de card --}}
		  	<div class="card">
		  		{{-- {!! Form::open(['method' => 'POST', 'route' => 'purchases.store', 'class' => 'form-horizontal']) !!} --}}
		  		{{-- Inicio card-body --}}
			    <div class="card-body">
					<div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de compra.</h4>
                    </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'purchases.store', 'class' => 'row g-3']) !!}

                    	@include('admin.purchase.partials.form')

			    {{-- fin card-body --}}
				</div>
				<div class="card-footer">
					@can('purchases.create')
						<div class="btn-group me-2" role="group" aria-label="Reset y agregar">
					        {!! Form::reset("Borrar contenido", ['class' => 'btn btn-warning']) !!}
					        {!! Form::submit("Agregar", ['class' => 'btn btn-primary', 'id' => 'guardar']) !!}
					    </div>
					@endcan
				    <a class="btn btn-light" href="{{ route('purchases.index') }}">Cancelar</a>
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
<script type="text/javascript" src="{{ asset('melody/js/data-table.js') }}"></script>
<!-- Custom js for this page-->
<script src="{{ asset('melody/js/alerts.js') }}"></script>
<script src="{{ asset('melody/js/avgrund.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/detalleCompra.js') }}"></script>
@endsection