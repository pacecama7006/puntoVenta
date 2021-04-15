@extends('layouts.admin')
@section('title', 'Movimiento/Detalle')
@section('estilos')
	{{-- expr --}}
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Movimiento del día: {{ date('d-m-Y', strtotime($move->fecha_mov)) }}</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item"><a href="{{ route('moves.index') }}">Movimiento</a></li>
				<li class="breadcrumb-item active" aria-current="page">
					Movimiento del día: {{ date('d-m-Y', strtotime($move->fecha_mov)) }}
				</li>
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
			    				<img src="{{ Storage::url($move->image) }}" alt="imagen_movimiento" class="img-lg rounded-circle mb-3">
			    				<h3>
			    					Movimiento del día: {{ date('d-m-Y', strtotime($move->fecha_mov)) }}
			    				</h3>
			    				<div class="d-flex justify-content-between">
			                    </div>
			    			</div>
			    			<div class="border-bottom py-4">
			    				@can('moves.create')
			    					<div class="list-group">
				    					<a href="{{ route('moves.create') }}" class="btn btn-success " role="button">
				    						Registrar movimiento.
				    					</a>
				    				</div>
			    				@endcan
			    			</div>
			    			<div class="py-4">
								<p class="clearfix">
									<span class="float-left">
										Concepto
									</span>
									<span class="float-right text-muted">
										{{ $move->concept->concepto }}
									</span>
								</p>
								<p class="clearfix">
									<span class="float-left">
										Conciliado
									</span>
									@if ($move->conciliado == 0)
										<span class="float-right text-muted">
											No conciliado
										</span>
									@else
										<span class="float-right text-muted">
											Conciliado
										</span>
									@endif
								</p>
							</div>
							@can('moves.conciliado')
								@if ($move->conciliado == 0)
									<a href="{{ route('moves.conciliado', $move) }}" class="btn btn-danger btn-block">
										No conciliado
									</a>
								@else
									<a href="{{ route('moves.conciliado', $move) }}" class="btn btn-success btn-block">
										Conciliado
									</a>
								@endif
							@endcan
			    		</div>


			    		<div class="col-lg-8 pl-lg-5">
			    			<div class="d-flex justify-content-between">
		                        <h4 class="card-title">Información del movimiento.</h4>
		                    </div>
		                    <div class="profile-feed">
				    			<div class="d-flex align-items-start profile-feed-item">
				    				<div class="form-group col-md-6">
				    					<strong><i class="fas fa-bookmark mr-1"></i>
				    						Caja
				    					</strong>
				    					<p class="text-muted">
				    						{{ $move->box->name }}
				    					</p>
				    					<hr>
				    					<strong><i class="far fa-id-card mr-1"></i>
				    						Responsable de la caja
				    					</strong>
				    					<p class="text-muted">
				    						{{ $move->box->user->name }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-gift mr-1"></i>
				    						Tipo de movimiento
				    					</strong>
				    					<p class="text-muted">
				    						{{ $move->tipo }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-tag mr-1"></i>
				    						Concepto
				    					</strong>
				    					<p class="text-muted">
				    						{{ $move->concept->concepto }}
				    					</p>
				    					<hr>
				    				</div>
				    				<div class="form-group col-md-6">
				    					<strong><i class="fas fa-address-card mr-1"></i>
				    						Motivo
				    					</strong>
				    					<p class="text-muted">
				    						{{ $move->detalle }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-building mr-1"></i>
				    						Importe
				    					</strong>
				    					<p class="text-muted">
				    						{{ $move->importe }}
				    					</p>
				    					<hr>
				    					<strong><i class="fas fa-credit-card mr-1"></i>
				    						Conciliado
				    					</strong>
				    					@if ($move->conciliado == 0)
				    						<p class="text-muted">
				    							No Conciliado
				    						</p>
				    					@else
				    						<p class="text-muted">
				    							Conciliado
				    						</p>
				    					@endif
				    					<hr>
				    				</div>
				    			</div>
				    		</div>
			    		</div>
			    	</div>
			    {{-- fin card-body --}}
				</div>
				<div class="card-footer text-muted">
					<a class="btn btn-primary" href="{{ route('moves.index') }}">Regresar</a>
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