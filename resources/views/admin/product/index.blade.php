@extends('layouts.admin')
@section('title', 'Productos/gestión')
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
	@can('products.create')
		<li class="nav-item d-note d-lg-flex">
			<a class="btn btn-primary" href="{{ route('products.create') }}">+Crear nuevo.</a>
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
		<h3 class="page-title">Gestión de Productos.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Productos</li>
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
                        <h4 class="card-title">Productos</h4>
                        <div class="btn-group">
						  @can('products.pdfProducts')
						  	<a href="{{ route('products.pdfProducts') }}" title="Exportar PDF">
							  	<span style="font-size: 20px;" class="me-2"><i class="far fa-file-pdf"></i></span>
							</a>
						  @endcan
						  @can('products.export')
						  	<a href="{{ route('products.export') }} " title="Exportar Excel">
							  	<span style="font-size: 20px;"><i class="fas fa-file-excel"></i></span>
							</a>
						  @endcan
						  @can('products.pdfProducts')
						  	<a href="{{ route('print_barcode') }}" title="Imprimir códigos de barras">
							  	<span style="font-size: 20px;" class="ms-2"><i class="fas fa-barcode"></i></span>
							</a>
						  @endcan
						</div>
                    </div>
					{{-- Inicio de tabla-responsive --}}
			      	<div class="table-responsive">
				        <table id="order-listing" class="table">
				        	<thead>
				        		<tr>
				        			<th>Código del producto</th>
				        			<th>Nombre</th>
				        			<th>Stock</th>
				        			<th>Medida</th>
				        			<th>Estado</th>
				        			<th>Categoría</th>
				        			<th>Acciones</th>
				        		</tr>
				        	</thead>
				          	<tbody>
								@foreach ($products as $product)
									<tr>
										<th scope="row">{{ $product->code }}</th>
										<td>
											{{ $product->name }}
										</td>
										<td> {{ $product->stock }} </td>
										<td> {{ $product->measure->simbolo }} </td>
										@can('products.status')
											@if ($product->status == 'ACTIVE')
											<td>
		                                        <a class="jsgrid-button btn btn-success" href="{{route('products.status', $product)}}" title="Editar">
		                                            Activo <i class="fas fa-check"></i>
		                                        </a>
		                                    </td>
										@else
											<td>
		                                        <a class="jsgrid-button btn btn-danger" href="{{route('products.status', $product)}}" title="Editar">
		                                            Desactivado <i class="fas fa-times"></i>
		                                        </a>
		                                    </td>
										@endif
										@endcan
										<td> {{ $product->category->name }} </td>
										<td style="width: 50px;">
											{!! Form::open(['route' => ['products.destroy', $product], 'method'=> 'delete']) !!}

												@can('products.show')
													<a class="jsgrid-button jsgrid-edit-button" href="{{ route('products.show', $product) }}" title="Detalles del producto"><i class="far fa-eye"></i></a>
												@endcan

												@can('products.edit', Model::class)
													<a class="jsgrid-button jsgrid-edit-button" href="{{ route('products.edit', $product) }}" title="Editar">
													<i class="far fa-edit"></i>
												</a>
												@endcan

												@can('products.destroy')
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