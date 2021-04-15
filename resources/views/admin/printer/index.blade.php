@extends('layouts.admin')
@section('title', 'Impresoras/gestión')
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
	{{-- <li class="nav-item d-note d-lg-flex">
		<a class="btn btn-primary" href="#">+Crear nuevo.</a>
	</li> --}}
@endsection
@section('content')
<div class="content-wrapper">
	@if (session('message'))
		<div class="alert alert-success" role='alert'>
			{{ session('message') }}
		</div>
	@endif
	<div class="page-header">
		<h3 class="page-title">Gestión de la impresora.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Impresoras</li>
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
					<div class="col-lg-8 pl-lg-5">
	                    {{-- <div class="border-bottom text-center pb-4">
		    				<img src="{{ Storage::url($business->logo) }}  " alt="producto" class="img-lg rounded-circle mb-3">
		    				<h3>{{ $business->name }}</h3>
		    				<div class="d-flex justify-content-between">
		                    </div>
		    			</div> --}}
	                    <div class="profile-feed">
			    			<div class="d-flex align-items-start profile-feed-item">
			    				<div class="form-group col-md-6">
			    					<strong><i class="fas fa-exclamation-circle mr-1"></i>
			    						Nombre
			    					</strong>
			    					<p class="text-muted">
			    						{{ $printer->name }}
			    					</p>
			    					<hr>
			    					{{-- <strong><i class="fas fa-address-card mr-1"></i>
			    						Descripción
			    					</strong>
			    					<p class="text-muted">
			    						{{ $business->description }}
			    					</p>
			    					<hr> --}}
			    				</div>
			    			</div>
			    		</div>
		    		</div>
			    {{-- fin card-body --}}
				</div>
				<div class="card-footer text-muted">
		            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-2">Actualizar</button>
		        </div>
			{{-- fin card --}}
		  	</div>
		{{-- fin columna --}}
		</div>
	{{-- Fin fila --}}
	</div>
</div>
{{-- Inicio modal --}}
<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de impresora</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            {!! Form::model($printer,['route'=>['printer.update',$printer], 'method'=>'PUT','files' => true]) !!}


            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$printer->name}}"
                        aria-describedby="helpId">
                </div>

                {{-- <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" id="description"
                        rows="3">{{$business->description}}</textarea>
                </div> --}}

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            </div>

        {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
@section('js')
	<script type="text/javascript" src="{{ asset('melody/js/data-table.js') }}"></script>
	<script type="text/javascript" src="{{ asset('melody/js/dropify.js') }}"></script>
	<script type="text/javascript">
		//Cambiar imagen
        document.getElementById("image").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var image = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(image);
        }
	</script>
@endsection