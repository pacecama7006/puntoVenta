@extends('layouts.admin')
@section('title', 'Cajas/registrar')
@section('estilos')
	{{-- expr --}}
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Registrar caja.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item"><a href="{{ route('boxes.index') }}">Cajas</a></li>
				<li class="breadcrumb-item active" aria-current="page">Registrar caja.</li>
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
                        <h4 class="card-title">Registro de caja.</h4>
                    </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'boxes.store', 'class' => 'form-horizontal']) !!}

                    	@include('admin.box.partials.form')

                        @can('boxes.create')
                        	<div class="btn-group me-2" role="group" aria-label="Reset y agregar">
						        {!! Form::reset("Borrar contenido", ['class' => 'btn btn-warning']) !!}
						        {!! Form::submit("Agregar", ['class' => 'btn btn-primary']) !!}
						    </div>
                        @endcan
					    <a class="btn btn-light" href="{{ route('boxes.index') }}">Cancelar</a>

                    {!! Form::close() !!}

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