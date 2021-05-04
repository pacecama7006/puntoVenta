@extends('layouts.admin')
@section('title', 'Ventas/registrar')
@section('estilos')
	{{-- <link rel="stylesheet" href="{{ asset('select/dist/css/bootstrap-select.min.css') }}"> --}}
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Registrar venta.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
				<li class="breadcrumb-item active" aria-current="page">Registrar venta.</li>
			</ol>
		</nav>
	</div>
	{{-- Inicio de fila --}}
	<div class="row">
		{{-- Inicio de columna --}}
		<div class="col-12 grid-margin stretch-card">
			{{-- Inicio de card --}}
		  	<div class="card">
		  		{{-- {!! Form::open(['method' => 'POST', 'route' => 'sales.store', 'class' => 'form-horizontal']) !!} --}}
		  		{{-- Inicio card-body --}}
			    <div class="card-body">
					<div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de venta.</h4>
                    </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'sales.store', 'class' => 'row g-3', 'id' =>'form_sale']) !!}
                    	<div class="col-md-3{{ $errors->has('num_vta') ? ' has-error' : '' }}">
						    {!! Form::label('num_vta', 'Número de venta:', ['class' => 'form-label']) !!}
						    {!! Form::number('num_vta', $num_vta, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
						    <small class="text-danger">{{ $errors->first('num_vta') }}</small>
						</div>
						<div class="col-md-3{{ $errors->has('sale_date') ? ' has-error' : '' }}">
						    {!! Form::label('sale_date', 'Fecha de la venta:', ['class' => 'form-label']) !!}
						    {!! Form::date('sale_date', $fecha_vta, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
						    <small class="text-danger">{{ $errors->first('sale_date') }}</small>
						</div>
						<div class="col-md-3{{ $errors->has('client_id') ? ' has-error' : '' }}">
						    {!! Form::label('client_id', 'Seleccione un Cliente:', ['class' => 'form-label']) !!}
						    {!! Form::select('client_id', $clients, null, ['placeholder' => 'Menú de clientes','id' => 'client_id','class' => 'form-select']) !!}
						    <small class="text-danger">{{ $errors->first('client_id') }}</small>
						</div>
						<div class="col-md-3{{ $errors->has('bar_code') ? ' has-error' : '' }}">
						    {!! Form::label('bar_code', 'Código de barras:', ['class' => 'form-label']) !!}
						    {!! Form::text('bar_code', null, ['id' =>'bar_code', 'name' => 'bar_code', 'class' => 'form-control', 'aria-describedby' => 'helpId']) !!}
						    <small class="text-muted">Campo opcional</small>
						    <small class="text-danger">{{ $errors->first('bar_code') }}</small>
						</div>
						<div class="col-md-3">
						    <label for="product_id" class="form-label">Seleccione un Producto:</label>
						    <select id="product_id" name="product_id" class="form-select">
						      <option selected>Menu de productos...</option>
						      @foreach ($products as $product)
						            <option value="{{ $product->id }}">
						                {{ $product->name }}
						            </option>
						          @endforeach
						    </select>
						</div>
						<div class="col-md-3{{ $errors->has('stock') ? ' has-error' : '' }}">
						    {!! Form::label('stock', 'Stock actual:', ['class' => 'form-label']) !!}
						    {!! Form::text('stock', null, ['id' =>'stock', 'class' => 'form-control', 'disabled' => 'disabled']) !!}
						    <small class="text-danger">{{ $errors->first('stock') }}</small>
						</div>
						<div class="col-md-3{{ $errors->has('quantity') ? ' has-error' : '' }}">
						    {!! Form::label('quantity', 'Cantidad:', ['class' => 'form-label']) !!}
						    {!! Form::number('quantity', null, ['class' => 'form-control', 'placeholder' =>'cantidad de producto (s)...']) !!}
						    <small class="text-danger">{{ $errors->first('quantity') }}</small>
						</div>
						<div class="col-md-3{{ $errors->has('medida') ? ' has-error' : '' }}">
						    {!! Form::label('medida', 'Medida:', ['class' => 'form-label']) !!}
						    {!! Form::text('medida', null, ['id' =>'medida', 'class' => 'form-control', 'aria-describedby' => 'helpId', 'disabled' => 'disabled']) !!}
						    <small class="text-danger">{{ $errors->first('medida') }}</small>
						</div>
						<div class="col-md-4{{ $errors->has('price') ? ' has-error' : '' }}">
						    {!! Form::label('price', 'Precio:', ['class' => 'form-label']) !!}
						    {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' =>'Indique el precio de venta']) !!}
						    <small class="text-danger">{{ $errors->first('price') }}</small>
						</div>
						<div class="col-md-4{{ $errors->has('tax') ? ' has-error' : '' }}">
						    {!! Form::label('tax', 'Impuesto:', ['class' => 'form-label']) !!}
						    {!! Form::number('tax', '0', ['class' => 'form-control']) !!}
						    <small class="text-danger">{{ $errors->first('tax') }}</small>
						</div>
						<div class="col-md-4{{ $errors->has('discount') ? ' has-error' : '' }}">
						    {!! Form::label('discount', 'Descuento:', ['class' => 'form-label']) !!}
						    {!! Form::number('discount', '0', ['class' => 'form-control']) !!}
						    <small class="text-danger">{{ $errors->first('discount') }}</small>
						</div>

						<div class="btn-group float-end me-5 mb-4">
						    <button class="btn btn-primary float-end me-2" type="button" id="agregar">
						        Agregar producto
						    </button>
						</div>
						<br>
						<br>
						<br>
						<div class="row mb-3">
						    <h4 class="card-title">Detalles de Venta</h4>
						    <div class="table-responsive col-md-12">
						        <table id="detalles" class="table table-striped">
						            <thead>
						                <tr>
						                    <th>Eliminar</th>
						                    <th>Producto</th>
						                    <th>Precio (Pesos)</th>
						                    <th>Descuento</th>
						                    <th>Cantidad</th>
						                    <th>Subtotal (Pesos)</th>
						                </tr>
						            </thead>
						            <tfoot>
						                <tr>
						                    <th colspan="5">
						                        <p align="right">SUB-TOTAL:</p>
						                    </th>
						                    <th>
						                        <p align="right"><span id="total">$ 0.00</span></p>
						                    </th>
						                </tr>
						                <tr>
						                    <th colspan="5">
						                        <p align="right">TOTAL IMPUESTO:</p>
						                    </th>
						                    <th>
						                        <p align="right"><span id="total_impuesto">$ 0.00</span></p>
						                    </th>
						                </tr>
						                <tr>
						                    <th colspan="5">
						                        <p align="right">TOTAL A PAGAR:</p>
						                    </th>
						                    <th>
						                        <p align="right">
						                            <span align="right" id="total_pagar_html">$ 0.00</span>
						                            <input type="hidden" name="total" id="total_pagar">
						                        </p>
						                    </th>
						                </tr>
						            </tfoot>
						            <tbody></tbody>
						        </table>
						    </div>
						</div>

			    {{-- fin card-body --}}
				</div>
				<div class="card-footer">
					@can('sales.create')
						<div class="btn-group me-2" role="group" aria-label="Reset y agregar">
					        {!! Form::reset("Borrar contenido", ['class' => 'btn btn-warning']) !!}
					        {!! Form::submit("Agregar", ['class' => 'btn btn-primary', 'id' => 'guardar']) !!}
					    </div>
					@endcan
				    <a class="btn btn-light" href="{{ route('sales.index') }}">Cancelar</a>
				</div>
				{!! Form::close() !!}
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

  <script src="{{ asset('melody/js/alerts.js') }}"></script>
  <script src="{{ asset('melody/js/avgrund.js') }}"></script>
  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
 {{-- <script src="{{ asset('js/detalleVenta.js') }}"></script> --}}
  <script type="text/javascript">

  	$(document).ready(function(){
  		//Inicio Función click
  		$("#agregar").click(function() {
		    agregar();
		});//Fin de la función click
  		//Función keypress para cancelar la tecla enter del teclado y no me envíe el formulario
  		//Cuando se genera el enter del lector de códigos de barras
		$('input').keypress(function(e){
		    if(e.which == 13){
		      return false;
		    }
		});//Fin de keypress

	    var cont = 1;
		total = 0;
		subtotal = [];
		$("#guardar").hide();

		$(obtener_registro_por_id());
		//Inicio Función obtener_registro_por_id
  		function obtener_registro_por_id(product_id) {
  			$.ajax({
  				url: 'get_products_by_id/' + product_id,
  				type: 'GET',
  				data:{
  					id: product_id,
  				},
  				success: function(product_id){
  					console.log(product_id);
  					for (var i = 0; i < product_id.length; i++) {
  						// $("#price").val(product_id[i].sell_price);
  						$("#stock").val(product_id[i].stock);
  						$("#bar_code").val("");
  						$("#medida").val(product_id[i].measure.simbolo);
  					}
  				},
  			});
  		};//Fin de la función obtener_registro_por_id
  		//Inicio Función change
  		$(document).on('change', '#product_id', function() {
		    var valorResultado = $(this).val();
		    if (valorResultado != "") {
		        obtener_registro_por_id(valorResultado);
		    } else {
		        obtener_registro_por_id();
		    }
		});//Fin de la función change

	  	$(obtener_registro());
  		//Inicio de la función obtener_registro
  		function obtener_registro(bar_code) {
  			$.ajax({
  				url: 'get_products_by_barcode/' + bar_code,
  				type: 'GET',
  				data:{
  					bar_code: bar_code,
  				},
  				success: function(bar_code){
  					console.log(bar_code);
  					for (var i = 0; i < bar_code.length; i++) {

  						// $("#price").val(bar_code[i].sell_price);
  						$("#stock").val(bar_code[i].stock);
		            	$("#product_id").val(bar_code[i].id);
		            	$("#medida").val(product_id[i].measure.simbolo);
  					}
  				},
  			});
  			return false;
  		};//Fin de la función obtener registro

		//Inicio de la función keyup
  		$(document).on('keyup', '#bar_code', function() {
		    var valorResultado = $(this).val();
		    if (valorResultado != "") {
		        obtener_registro(valorResultado);
		    } else {
		        obtener_registro();
		    }
		});//Fin de la función keyup
  		// Función para agregar productos a la tabla
		function agregar() {
		    datosProducto= $("#product_id").val();
		    product_id = datosProducto[0];
		    producto = $("#product_id option:selected").text();
		    quantity = $("#quantity").val();
		    discount = $("#discount").val();
		    price = $("#price").val();
		    stock = $("#stock").val();
		    impuesto = $("#tax").val();
		    if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "") {
		        if (parseFloat(stock) >= parseFloat(quantity)) {
		            subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
		            total = total + subtotal[cont];
		            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td> <td> <input type="hidden" name="price[]" value="' + parseFloat(price).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(price).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="discount[]" value="' + parseFloat(discount) + '"> <input class="form-control" type="number" value="' + parseFloat(discount) + '" disabled> </td> <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input type="number" value="' + quantity + '" class="form-control" disabled> </td> <td align="right">$ ' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
		            cont++;
		            limpiar();
		            totales();
		            evaluar();
		            $('#detalles').append(fila);
		            $("#bar_code").focus();
		        } else {
		            Swal.fire({
		                type: 'error',
		                text: 'La cantidad a vender supera el stock.',
		            })
		        }
		    } else {
		        Swal.fire({
		            type: 'error',
		            text: 'Rellene todos los campos del detalle de la venta.',
		        })
		    }
		};//Fin de la función agregar
		//Función limpiar
		function limpiar() {
		    $("#quantity").val("");
		    $("#discount").val("0");
		    $("#bar_code").val("");
		};//Fin de la función limpiar
		//Función totales
		function totales() {
		    $("#total").html("$ " + total.toFixed(2));
		    total_impuesto = total * impuesto / 100;
		    total_pagar = total + total_impuesto;
		    $("#total_impuesto").html("$ " + total_impuesto.toFixed(2));
		    $("#total_pagar_html").html("$ " + total_pagar.toFixed(2));
		    $("#total_pagar").val(total_pagar.toFixed(2));
		};//Fin de la función totales
		//Función evaluar
		function evaluar() {
		    if (total > 0) {
		        $("#guardar").show();
		    } else {
		        $("#guardar").hide();
		    }
		};//Fin de la función evaluar
		//Función eliminar
		function eliminar(index) {
		    total = total - subtotal[index];
		    total_impuesto = total * impuesto / 100;
		    total_pagar_html = total + total_impuesto;
		    $("#total").html("$" + total);
		    $("#total_impuesto").html("$" + total_impuesto);
		    $("#total_pagar_html").html("$" + total_pagar_html);
		    $("#total_pagar").val(total_pagar_html.toFixed(2));
		    $("#fila" + index).remove();
		    evaluar();
		}; //Fin de la función eliminar
	//fin del document ready
  	});
  </script>
@endsection