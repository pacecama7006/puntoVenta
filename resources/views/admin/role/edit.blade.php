@extends('layouts.admin')
@section('title', 'Roles/Editar')
@section('estilos')
	{{-- expr --}}
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Editar rol.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
				<li class="breadcrumb-item active" aria-current="page">Editar rol.</li>
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
                        <h4 class="card-title">Editar rol.</h4>
                    </div>
                    {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}

                    	@include('admin.role.partials.form')

                        @can('roles.edit')
                        	<div class="btn-group me-2" role="group" aria-label="Actualizar">
						        {!! Form::submit("Actualizar", ['class' => 'btn btn-primary']) !!}
						    </div>
                        @endcan
					    <a class="btn btn-light" href="{{ route('roles.index') }}">Cancelar</a>

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