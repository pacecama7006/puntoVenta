@extends('layouts.admin')
@section('title', 'Clientes/Detalle')
@section('estilos')
	{{-- expr --}}
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">{{ $client->name }}</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ $client->name }}</li>
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
			    				<h3>{{ $client->name }}</h3>
			    				<div class="d-flex justify-content-between">
			                    </div>
			    			</div>
			    			<div class="border-bottom py-4">
			    				<div class="list-group">
			    					{{-- <a href="#" class="btn btn-info " role="button">
			    						Historial de ventas.
			    					</a> --}}
			    					@can('products.create')
			    						<a href="{{ route('products.create') }}" class="btn btn-success " role="button">
			    						Registrar producto.
			    					</a>
			    					@endcan
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-lg-8 pl-lg-5">
			    			<div class="d-flex justify-content-between">
		                        <h4 class="card-title">Información del cliente.</h4>
		                    </div>
		                    <div class="profile-feed">
				    			<div class="d-flex align-items-start profile-feed-item">
				    				<div class="form-group col-md-6">
				    					<strong><i class="fas fa-user-check mr-1"></i>
				    						Nombre
				    					</strong>
				    					<p class="text-muted">
				    						{{ $client->name }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-address-card mr-1"></i>
				    						R.F.C
				    					</strong>
				    					<p class="text-muted">
				    						{{ $client->rfc_number }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-phone mr-1"></i>
				    						Teléfono
				    					</strong>
				    					<p class="text-muted">
				    						{{ $client->phone }}
				    					</p>
				    					<hr>
				    				</div>
				    				<div class="form-group col-md-6">
				    					<strong><i class="fas fa-envelope mr-1"></i>
				    						Correo
				    					</strong>
				    					<p class="text-muted">
				    						{{ $client->email }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-map-marker mr-1"></i>
				    						Dirección
				    					</strong>
				    					<p class="text-muted">
				    						{{ $client->address }}
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
					<a class="btn btn-primary" href="{{ route('clients.index') }}">Regresar</a>
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