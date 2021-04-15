@extends('layouts.admin')
@section('title', 'Productos/editar')
@section('estilos')
	<style type="text/css">
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Editar producto.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
				<li class="breadcrumb-item active" aria-current="page">Editar producto.</li>
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
                        <h4 class="card-title">Edición de producto.</h4>
                    </div>
                    {!! Form::model($product,['method' => 'PUT', 'route' => ['products.update', $product], 'files' => true,'class' => 'row g-3']) !!}
                    		{!! Form::hidden('id', $product->id) !!}
                    	@include('admin.product.partials.form')

                        @can('products.edit')
                        	<div class="btn-group me-2" role="group" aria-label="Reset y agregar">
						        {!! Form::submit("Actualizar", ['class' => 'btn btn-primary']) !!}
						        <a class="btn btn-light ms-2" href="{{ route('products.index') }}">Cancelar</a>
						    </div>
                        @endcan

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
	<script src="{{ asset('melody/js/dropify.js') }}"></script>
	<script type="text/javascript" src="{{ asset('jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
	<script type="text/javascript">
		//slug
		$(document).ready( function() {
			$("#name").stringToSlug({
				setEvents: 'keyup keydown blur',
				getPut: '#slug',
				space: '-'
			});
		});
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