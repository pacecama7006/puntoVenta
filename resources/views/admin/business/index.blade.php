@extends('layouts.admin')
@section('title', 'Empresas/gestión')
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
		<h3 class="page-title">Gestión de la Empresa.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item active" aria-current="page">Empresas</li>
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
	                    <div class="border-bottom text-center pb-4">
		    				<img src="{{ Storage::url($business->logo) }} {{-- {{ asset('storage/logo/logo_empresa_faker.png') }} --}} " alt="logo" class="img-lg rounded-circle mb-3">
		    				<h3>{{ $business->name }}</h3>
		    				<div class="d-flex justify-content-between">
		                    </div>
		    			</div>
	                    <div class="profile-feed">
			    			<div class="d-flex align-items-start profile-feed-item">
			    				<div class="form-group col-md-6">
			    					<strong><i class="fas fa-building mr-1"></i>
			    						Nombre
			    					</strong>
			    					<p class="text-muted">
			    						{{ $business->name }}
			    					</p>
			    					<hr>
			    					<strong><i class="fas fa-exclamation-circle mr-1"></i>
			    						Descripción
			    					</strong>
			    					<p class="text-muted">
			    						{{ $business->description }}
			    					</p>
			    					<hr>
			    					<strong><i class="fas fa-id-card mr-1"></i>
			    						R.F.C.
			    					</strong>
			    					<p class="text-muted">
			    						{{ $business->rfc }}
			    					</p>
			    					<hr>
			    					<strong><i class="fas fa-map-marker-alt mr-1"></i>
			    						Dirección
			    					</strong>
			    					<p class="text-muted">
			    						{{ $business->adress }}
			    					</p>
			    					<hr>
			    				</div>
			    				<div class="form-group col-md-6">
			    					<strong><i class="fas fa-phone-volume mr-1"></i>
			    						Teléfono
			    					</strong>
			    					<p class="text-muted">
			    						{{ $business->phone }}
			    					</p>
			    					<hr>
			    					<strong><i class="fas fa-envelope-open mr-1"></i>
			    						Correo
			    					</strong>
			    					<p class="text-muted">
			    						{{ $business->email }}
			    					</p>
			    					<hr>
			    					<div class="row">
				                        <div class="col-md-6">
				                            <strong><i class="fas fa-image mr-1"></i> Logo</strong><br>
				                        </div>
				                        <div class="col-md-6">
				                            <img style="width:50px ; height:50px ;" src=" {{ Storage::url($business->logo) }} "
				                                class="rounded float-left" alt="logo" name="logo" id="logo">
				                        </div>
				                    </div>
				                    <hr>
			    				</div>
			    			</div>
			    		</div>
		    		</div>
			    {{-- fin card-body --}}
				</div>
				<div class="card-footer text-muted">
		            @can('business.update')
		            	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-2">Actualizar</button>
		            @endcan
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
                <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            {!! Form::model($business,['route'=>['business.update',$business], 'method'=>'PUT','files' => true]) !!}


            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$business->name}}"
                        aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" id="description"
                        rows="3">{{$business->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="rfc">R.F.C.</label>
                    <input type="text" class="form-control" name="rfc" id="rfc" value="{{$business->rfc}}"
                        aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="adress">Dirección</label>
                    <input type="text" class="form-control" name="adress" id="adress" value="{{$business->adress}}"
                        aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{$business->phone}}"
                        aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$business->email}}"
                        aria-describedby="helpId">
                </div>

                <div class="card-body">
                    <h5 class="card-title d-flex">Logo
                        <small class="ml-auto align-self-end">
                            <p class="font-weight-light">Seleccionar Archivo</p>
                        </small>
                    </h5>
                    <input type="file" name="logo" id="logo" class="dropify" />
                </div>


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