@extends('layouts.admin')
@section('title', 'Productos/Detalle')
@section('estilos')
	{{-- expr --}}
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">{{ $product->name }}</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item"><a href="{{ route('products.index') }}">Producto</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
			</ol>
		</nav>
	</div>
	{{-- Inicio de fila --}}
	<div class="row">
		{{-- Inicio de columna --}}
		<div class="col-12">
			{{-- Inicio de card --}}
		  	<div class="card">
		  		{{-- Inicio card-body --}}
			    <div class="card-body">
			    	<div class="row">
			    		<div class="col-lg-4">
			    			<div class="border-bottom text-center pb-4">
			    				<img src="{{ Storage::url($product->image) }}" alt="producto" class="img-lg rounded-circle mb-3">
			    				<h3>{{ $product->name }}</h3>
			    				<div class="d-flex justify-content-between">
			                    </div>
			    			</div>
			    			@can('products.create')
			    				<div class="border-bottom py-4">
				    				<div class="list-group">
				    					<a href="{{ route('products.create') }}" class="btn btn-success " role="button">
				    						Registrar producto.
				    					</a>
				    				</div>
				    			</div>
			    			@endcan
			    			<div class="py-4">
								<p class="clearfix">
									<span class="float-left">
										Status
									</span>
									<span class="float-right text-muted">
										{{ $product->status }}
									</span>
								</p>
								<p class="clearfix">
									<span class="float-left">
										Categoría
									</span>
									<span class="float-right text-muted">
										{{ $product->category->name }}
									</span>
								</p>
								<p class="clearfix">
									<span class="float-left">
										Proveedor
									</span>
									<span class="float-right text-muted">
										<a href="{{ route('providers.show', $product->provider->id) }}">
											{{ $product->provider->name }}
										</a>
									</span>
								</p>

								<p class="clearfix">
									<span class="float-left">
										Teléfono
									</span>
									<span class="float-right text-muted">
										{{ $product->provider->phone }}
									</span>
								</p>
								<p class="clearfix">
									<span class="float-left">
										Correo
									</span>
									<span class="float-right text-muted">
										{{ $product->provider->email }}
									</span>
								</p>
							</div>
							@if ($product->status == 'ACTIVE')
								<button class="btn btn-success btn-block">{{ $product->status }}</button>
							@else
								<button class="btn btn-danger btn-block">{{ $product->status }}</button>
							@endif
			    		</div>


			    		<div class="col-lg-8 pl-lg-5">
			    			<div class="d-flex justify-content-between">
		                        <h4 class="card-title">Información del producto.</h4>
		                    </div>
		                    <div class="profile-feed">
				    			<div class="d-flex align-items-start profile-feed-item">
				    				<div class="form-group col-md-6">
				    					<strong><i class="fas fa-bookmark mr-1"></i>
				    						Código
				    					</strong>
				    					<p class="text-muted">
				    						{{ $product->code }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-gift mr-1"></i>
				    						Nombre
				    					</strong>
				    					<p class="text-muted">
				    						{{ $product->name }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-address-card mr-1"></i>
				    						Descripción
				    					</strong>
				    					<p class="text-muted">
				    						{{ $product->description }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-building mr-1"></i>
				    						Stock
				    					</strong>
				    					<p class="text-muted">
				    						{{ $product->stock }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-credit-card mr-1"></i>
				    						Precio venta
				    					</strong>
				    					<p class="text-muted">
				    						{{ $product->sell_price }}
				    					</p>
				    					<hr>
				    				</div>
				    				<div class="form-group col-md-6">
				    					<strong><i class="fas fa-info-circle mr-1"></i>
				    						Status
				    					</strong>
				    					<p class="text-muted">
				    						{{ $product->status }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-tag mr-1"></i>
				    						Categoría
				    					</strong>
				    					<p class="text-muted">
				    						{{ $product->category->name }}
				    					</p>
				    					<hr>
				    					<strong><i class="far fa-id-card mr-1"></i>
				    						Proveedor
				    					</strong>
				    					<p class="text-muted">
				    						{{ $product->provider->name }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-barcode mr-1"></i>
				    						Código de barras
				    					</strong>
				    					<p class="text-muted">
				    						{!!DNS1D::getBarcodeSVG($product->bar_code, 'C39'); !!}
				    					</p>
				    					<hr>
				    				</div>
				    			</div>
				    		</div>
			    		</div>
			    	</div>
			    {{-- fin card-body --}}
				</div>
				<div class="card-footer text-muted">
					<a class="btn btn-primary" href="{{ route('products.index') }}">Regresar</a>
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