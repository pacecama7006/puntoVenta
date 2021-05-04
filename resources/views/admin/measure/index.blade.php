@extends('layouts.admin')
@section('title', 'Medidas/gestión')
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
	@can('measures.create')
		<li class="nav-item d-note d-lg-flex">
		<a class="btn btn-primary" href="{{ route('measures.create') }}">+Crear nueva.</a>
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
		<h3 class="page-title">Gestión de Medidas.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item active" aria-current="">Medidas</li>
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
                        <h4 class="card-title">Medidas</h4>
                        <div class="btn-group">
						  @can('measures.pdfMeasures')
						  	<a href="{{ route('measures.pdfMeasures') }}" title="Exportar PDF">
							  	<span style="font-size: 20px;" class="me-2"><i class="far fa-file-pdf"></i></span>
							</a>
						  @endcan
						  @can('measures.export')
						  	<a href="{{ route('measures.export') }}" title="Exportar Excel">
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
				        			<th>Medida</th>
				        			<th>Símbolo</th>
				        			<th>Acciones</th>
				        		</tr>
				        	</thead>
				          	<tbody>
								@foreach ($measures as $measure)
									<tr>
										<th scope="row">{{ $measure->medida }}</th>
										<td>{{ $measure->simbolo }}</td>
										<td style="width: 50px;">
											{!! Form::open(['route' => ['measures.destroy', $measure], 'method'=> 'delete']) !!}

												@can('measures.edit', Model::class)
													<a class="jsgrid-button jsgrid-edit-button" href="{{ route('measures.edit', $measure) }}" title="Editar">
														<i class="far fa-edit"></i>
													</a>
												@endcan

												@can('measures.destroy')
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