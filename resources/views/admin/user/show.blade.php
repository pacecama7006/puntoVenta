@extends('layouts.admin')
@section('title', 'Usuarios/Detalle')
@section('estilos')
	{{-- expr --}}
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">{{ $user->name }}</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
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
			    				<h3>{{ $user->name }}</h3>
			    				<div class="d-flex justify-content-between">
			                    </div>
			    			</div>
			    			<div class="border-bottom py-4">
			    				<div class="list-group">
			    					{{-- <a href="{{ route('products.create') }}" class="btn btn-success " role="button">
			    						Registrar producto.
			    					</a> --}}
			    				</div>
			    			</div>
			    		</div>
			    		<div class="col-lg-8 pl-lg-5">
			    			<div class="d-flex justify-content-between">
		                        <h4 class="card-title">Información del usuario.</h4>
		                    </div>
		                    <div class="profile-feed">
				    			<div class="d-flex align-items-start profile-feed-item">
				    				<div class="form-group col-md-6">
				    					<strong><i class="fas fa-user-check mr-1"></i>
				    						Nombre
				    					</strong>
				    					<p class="text-muted">
				    						{{ $user->name }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-envelope mr-1"></i>
				    						Correo
				    					</strong>
				    					<p class="text-muted">
				    						{{ $user->email }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-user-tag mr-1"></i>
				    						Rol(es)
				    					</strong>
				    					@foreach ($user->roles as $role)
				    						<p class="text-muted">
					    						{{ $role->name }}
					    					</p>
					    					<hr>
				    					@endforeach

				    				</div>
				    			</div>
				    		</div>
			    		</div>
			    	</div>
			    {{-- fin card-body --}}
				</div>
				<div class="card-footer text-muted">
					<a class="btn btn-primary" href="{{ route('users.index') }}">Regresar</a>
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