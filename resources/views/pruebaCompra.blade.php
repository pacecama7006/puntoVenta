@extends('layouts.admin')
@section('title', 'Compras/registrar')
@section('estilos')
	<link rel="stylesheet" type="text/css" href="{{ asset('select2-develop/dist/css/select2.min.css') }}">
	<style type="text/css">
	.select2-container .select2-selection--single {
	    box-sizing: border-box;
	    cursor: pointer;
	    display: block;
	    /*height: 28px;*/
	    padding-top: 2px;
	    height: 35px;
	    user-select: none;
	    -webkit-user-select: none;
	}
	</style>
@endsection
@section('preference')
	{{-- expr --}}
@endsection
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Registrar compra.</h3>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
				<li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Compras</a></li>
				<li class="breadcrumb-item active" aria-current="page">Registrar compra.</li>
			</ol>
		</nav>
	</div>
	{{-- Inicio de fila --}}
	<div class="row">
		{{-- Inicio de columna --}}
		<div class="col-12 grid-margin stretch-card">
			{{-- Inicio de card --}}
		  	<div class="card">
		  		{{-- {!! Form::open(['method' => 'POST', 'route' => 'purchases.store', 'class' => 'form-horizontal']) !!} --}}
		  		{{-- Inicio card-body --}}
			    <div class="card-body">
					<div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de compra.</h4>
                    </div>
                    {!! Form::open(['method' => 'POST', 'route' => 'purchases.store', 'class' => 'row g-3']) !!}

                    	<div class="col-md-3{{ $errors->has('num_compra') ? ' has-error' : '' }}">
						    {!! Form::label('num_compra', 'Num. de Compra:', ['class' => 'form-label']) !!}
						    {!! Form::number('num_compra', $num_compra, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
						    <small class="text-danger">{{ $errors->first('num_compra') }}</small>
						</div>
						<div class="col-md-3{{ $errors->has('purchase_date') ? ' has-error' : '' }}">
						    {!! Form::label('purchase_date', 'Fecha de la compra:', ['class' => 'form-label']) !!}
						    {!! Form::date('purchase_date', $fecha_compra, ['class' => 'form-control','disabled' => 'disabled']) !!}
						    <small class="text-danger">{{ $errors->first('purchase_date') }}</small>
						</div>
						<div class="col-md-3{{ $errors->has('provider_id') ? ' has-error' : '' }}">
						    {!! Form::label('provider_id', 'Seleccione un Proveedor:', ['class' => 'form-label']) !!}
						    {!! Form::select('provider_id', $providers, null, ['id' => 'provider_id','class' => 'form-select']) !!}
						    <small class="text-danger">{{ $errors->first('provider_id') }}</small>
						</div>
						<div class="col-md-3{{ $errors->has('bar_code') ? ' has-error' : '' }}">
						    {!! Form::label('bar_code', 'Código de barras:', ['class' => 'form-label']) !!}
						    {!! Form::text('bar_code', null, ['id' =>'bar_code', 'class' => 'form-control', 'aria-describedby' => 'helpId']) !!}
						    <small class="text-muted">Campo opcional</small>
						    <small class="text-danger">{{ $errors->first('bar_code') }}</small>
						</div>
						{{-- <div class="col-md-3{{ $errors->has('product_id') ? ' has-error' : '' }}">
						    {!! Form::label('product_id', 'Seleccione un Producto:', ['class' => 'form-label']) !!}
						    {!! Form::select('product_id', $products, null, ['placeholder'=> 'Seleccione un producto', 'id' => 'product_id','class' => 'form-select']) !!}
						    <small class="text-danger">{{ $errors->first('product_id') }}</small>
						</div> --}}
					    <div class="form-group col-md-3">
					        <div class="form-group">
					            <label for="product_id" class="form-label mb-3">Producto</label>
					            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
					            {{-- <select class="form-control" name="product_id" id="product_id"> --}}
					            	<select class="form-control" name="product_id" id="product_id">
					                {{-- <option value="" disabled selected></option> --}}
					                <option value="" disabled selected></option>
					                @foreach ($products as $product)
					                <option value="{{$product->id}}">{{$product->name}}</option>
					                @endforeach
					            </select>
					        </div>
					    </div>
						<div class="col-md-3{{ $errors->has('quantity') ? ' has-error' : '' }}">
						    {!! Form::label('quantity', 'Cantidad:', ['class' => 'form-label']) !!}
						    {!! Form::number('quantity', null, ['class' => 'form-control', 'placeholder' =>'cantidad de producto (s)...', 'step' => '0.1']) !!}
						    <small class="text-danger">{{ $errors->first('quantity') }}</small>
						</div>
						{{-- <div class="col-md-3{{ $errors->has('measure_id') ? ' has-error' : '' }}">
						    {!! Form::label('measure_id', 'Medida:', ['class' => 'form-label']) !!}
						    {!! Form::select('measure_id', $medidas, null, ['id' => 'measure_id','class' => 'form-select']) !!}
						    <small class="text-danger">{{ $errors->first('measure_id') }}</small>
						</div> --}}
						<div class="col-md-3{{ $errors->has('medida') ? ' has-error' : '' }}">
						    {!! Form::label('medida', 'Medida:', ['class' => 'form-label']) !!}
						    {!! Form::text('medida', null, ['id' =>'medida', 'class' => 'form-control', 'aria-describedby' => 'helpId', 'disabled' => 'disabled']) !!}
						    <small class="text-danger">{{ $errors->first('medida') }}</small>
						</div>
						<div class="col-md-3{{ $errors->has('price') ? ' has-error' : '' }}">
						    {!! Form::label('price', 'Precio:', ['class' => 'form-label']) !!}
						    {!! Form::number('price', null, ['class' => 'form-control', 'disabled' =>'disabled', 'step' => '0.1']) !!}
						    <small class="text-danger">{{ $errors->first('price') }}</small>
						</div>
						<div class="col-md-3{{ $errors->has('tax') ? ' has-error' : '' }}">
						    {!! Form::label('tax', 'Impuesto:', ['class' => 'form-label']) !!}
						    {!! Form::number('tax', '0', ['class' => 'form-control', 'step' => '0.1']) !!}
						    <small class="text-danger">{{ $errors->first('tax') }}</small>
						</div>
						<div class="col-md-6{{ $errors->has('picture') ? ' has-error' : '' }}">
						    {!! Form::label('picture', 'Seleccione una imagen: ', ['class' => 'form-label']) !!}
						    {!! Form::file('picture', ['class' => 'form-control']) !!}
						    <small class="text-muted">Campo opcional</small>
						    <small class="help-block">Sólo imágenes o PDF</small>
						    <small class="text-danger">{{ $errors->first('picture') }}</small>
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
						    <h4 class="card-title">Detalles de compra</h4>
						    <div class="table-responsive col-md-12">
						        <table id="detalles" class="table table-striped">
						            <thead>
						                <tr>
						                    <th>Eliminar</th>
						                    <th>Producto</th>
						                    <th>Precio (Pesos)</th>
						                    <th>Cantidad</th>
						                    <th>Subtotal (Pesos)</th>
						                </tr>
						            </thead>
						            <tfoot>
						                <tr>
						                    <th colspan="4">
						                        <p align="right">SUB-TOTAL:</p>
						                    </th>
						                    <th>
						                        <p align="right"><span id="total">$ 0.00</span></p>
						                    </th>
						                </tr>
						                <tr id="dvOcultar">
						                    <th colspan="4">
						                        <p align="right">TOTAL IMPUESTO:</p>
						                    </th>
						                    <th>
						                        <p align="right"><span id="total_impuesto">$ 0.00</span></p>
						                    </th>
						                </tr>
						                <tr>
						                    <th colspan="4">
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
					@can('purchases.create')
						<div class="btn-group me-2" role="group" aria-label="Reset y agregar">
					        {!! Form::reset("Borrar contenido", ['class' => 'btn btn-warning']) !!}
					        {!! Form::submit("Agregar", ['class' => 'btn btn-primary', 'id' => 'guardar']) !!}
					    </div>
					@endcan
				    <a class="btn btn-light" href="{{ route('purchases.index') }}">Cancelar</a>
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
	{{-- <script type="text/javascript" src="{{ asset('melody/js/data-table.js') }}"></script>

  <script src="{{ asset('melody/js/alerts.js') }}"></script>
  <script src="{{ asset('melody/js/avgrund.js') }}"></script> --}}
  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
 {{-- <script src="{{ asset('js/detalles2.js') }}"></script> --}}
 <script type="text/javascript" src="{{ asset('select2-develop/dist/js/select2.min.js') }}"></script>
 <script type="text/javascript">
$(document).ready(function() {
    //Inicio Función click
    $("#agregar").click(function() {
        agregar();
    }); //Fin de la función click
    //Función keypress para cancelar la tecla enter del teclado y no me envíe el formulario
    //Cuando se genera el enter del lector de códigos de barras
    $('input').keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    }); //Fin de keypress
    //fin del document ready
});
var cont = 0;
var total = 0;
var subtotal = [];
$("#guardar").hide();
//var product_id = $('#product_id');
$(obtener_registro_por_id());
//Inicio Función obtener_registro_por_id
function obtener_registro_por_id(product_id) {
    $.ajax({
        url: 'get_products_by_id/' + product_id,
        type: 'GET',
        data: {
            id: product_id,
        },
        success: function(product_id) {
            console.log(product_id);
            for (var i = 0; i < product_id.length; i++) {
                $("#bar_code").val(product_id[i].bar_code);
                $("#price").val(product_id[i].sell_price);
                $("#stock").val(product_id[i].stock);
                $("#medida").val(product_id[i].measure.simbolo);
            }
        },
    });
}; //Fin de la función obtener_registro_por_id
//Inicio Función change
$(document).on('change', '#product_id', function() {
    var valorResultado = $(this).val();
    if (valorResultado != "") {
        obtener_registro_por_id(valorResultado);
    } else {
        obtener_registro_por_id();
    }
}); //Fin de la función change
$(obtener_registro());
//Inicio de la función obtener_registro
function obtener_registro(bar_code) {
    $.ajax({
        url: 'get_products_by_barcode/' + bar_code,
        type: 'GET',
        data: {
            bar_code: bar_code,
        },
        success: function(bar_code) {
            console.log(bar_code);
            for (var i = 0; i < bar_code.length; i++) {
                $("#product_id").val(bar_code[i].id);
                $('#product_id').trigger('change');
            }
        },
    });
    // return false;
}; //Fin de la función obtener registro
//Inicio de la función keyup
$(document).on('keyup', '#bar_code', function() {
    var valorResultado = $(this).val();
    if (valorResultado != "") {
        obtener_registro(valorResultado);
    } else {
        obtener_registro();
    }
}); //Fin de la función keyup
// Función para agregar productos a la tabla
function agregar() {
    product_id = $("#product_id").val();
    producto = $("#product_id option:selected").text();
    quantity = $("#quantity").val();
    price = $("#price").val();
    impuesto = $("#tax").val();
    if (product_id != "" && quantity != "" && quantity > 0 && price != "") {
        subtotal[cont] = quantity * price;
        total = total + subtotal[cont];
        /*new Intl.NumberFormat('en-Us').format(subtotal[cont]);
            new Intl.NumberFormat('en-Us').format(total);*/
        var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td> <td> <input type="hidden" id="price[]" name="price[]" value="' + price + '"> <input class="form-control" type="number" id="price[]" value="' + price + '" disabled> </td>  <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input class="form-control" type="number" value="' + quantity + '" disabled> </td> <td align="right">$ ' + subtotal[cont] + ' </td></tr>';
        /*var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td> <td> <input type="hidden" id="price[]" name="price[]" value="' + price + '"> <input class="form-control" type="number" id="price[]" value="' + price + '" disabled> </td>  <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input class="form-control" type="number" value="' + quantity + '" disabled> </td> <td align="right">' + new Intl.NumberFormat('en-US', {style: 'currency', currency: 'USD'}).format(subtotal[cont]) + ' </td></tr>';*/
        console.log("El valor del contador es: " + cont);
        console.log(fila);
        cont++;
        limpiar();
        totales();
        evaluar();
        $('#detalles').append(fila);
        $("#bar_code").focus();
    } else {
        Swal.fire({
            type: 'error',
            text: 'Rellene todos los campos del detalle de la compras',
        })
    }
}; //Fin de la función agregar
//Función limpiar
function limpiar() {
    $("#quantity").val("");
    $("#price").val("");
    $("#bar_code").val("");
}; //Fin de la función limpiar
//Función totales
function totales() {
    $("#total").html("$ " + total.toFixed(2));
    // $("#total").html(new Intl.NumberFormat('en-US', {style: 'currency', currency: 'USD'}).format(total));
    total_impuesto = total * impuesto / 100;
    total_pagar = total + total_impuesto;
    /*console.log('total impuesto' + '' + total_impuesto + '' + 'total a pagar' + '' + total_pagar);

    console.log('$ ',new Intl.NumberFormat('en-Us').format(total_impuesto), new Intl.NumberFormat('en-Us').format(total_pagar));*/
    $("#total_impuesto").html("$ " + total_impuesto.toFixed(2));
    $("#total_pagar_html").html("$ " + total_pagar.toFixed(2));
    $("#total_pagar").val(total_pagar.toFixed(2));
    /*$("#total_impuesto").html(new Intl.NumberFormat('en-Us', {style: 'currency', currency: 'USD'}).format(total_impuesto));
    $("#total_pagar_html").html(new Intl.NumberFormat('en-Us', {style: 'currency', currency: 'USD'}).format(total_pagar));
    $("#total_pagar").val(total_pagar.toFixed(2));*/
}; //Fin de la función totales
//Función evaluar
function evaluar() {
    if (total > 0) {
        $("#guardar").show();
    } else {
        $("#guardar").hide();
    }
}; //Fin de la función evaluar
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
$("#product_id").select2({
    placeholder: 'Seleccione un Producto:',
});
 </script>
 {{-- <script type="text/javascript">
$(document).ready(function() {
    //Inicio Función click
    $("#agregar").click(function() {
        agregar();
    }); //Fin de la función click
    //Función keypress para cancelar la tecla enter del teclado y no me envíe el formulario
    //Cuando se genera el enter del lector de códigos de barras
    $('input').keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    }); //Fin de keypress
    //Creación del select2 para búsqueda en vivo
    $("#product_id").select2({
        placeholder: 'Seleccione un Producto:',
    }); //Fin del select2
    //fin del document ready
});
var cont = 1;
total = 0;
subtotal = [];
$("#guardar").hide();
$(obtener_registro_por_id());
//Inicio Función obtener_registro_por_id
function obtener_registro_por_id(product_id) {
    $.ajax({
        url: '/get_products_by_id/' + product_id,
        type: 'GET',
        data: {
            id: product_id,
        },
        success: function(product_id) {
            console.log(product_id);
            for (var i = 0; i < product_id.length; i++) {
                $("#price").val(product_id[i].sell_price);
                $("#stock").val(product_id[i].stock);
                // $("#medidas").val(product_id[i].measure_id);
                $("#medida").val(product_id[i].measure.simbolo);
                /*$('#measure_id').trigger('change');*/
                $("#bar_code").val(product_id[i].bar_code);
            }
        },
    });
}; //Fin de la función obtener_registro_por_id
//Inicio Función change
$(document).on('change', '#product_id', function() {
    var valorResultado = $(this).val();
    if (valorResultado != "") {
        obtener_registro_por_id(valorResultado);
    } else {
        obtener_registro_por_id();
    }
}); //Fin de la función change
$(obtener_registro());
//Inicio de la función obtener_registro
function obtener_registro(bar_code) {
    $.ajax({
        url: '/get_products_by_barcode/' + bar_code,
        type: 'GET',
        data: {
            bar_code: bar_code,
        },
        success: function(bar_code) {
            console.log(bar_code);
            for (var i = 0; i < bar_code.length; i++) {
                $("#price").val(bar_code[i].sell_price);
                $("#stock").val(bar_code[i].stock);
                $("#product_id").val(bar_code[i].id);
                $('#product_id').trigger('change');
            }
        },
    });
    return false;
}; //Fin de la función obtener registro
//Inicio de la función keyup
$(document).on('keyup', '#bar_code', function() {
    var valorResultado = $(this).val();
    if (valorResultado != "") {
        obtener_registro(valorResultado);
    } else {
        obtener_registro();
    }
}); //Fin de la función keyup

/*$(get_measures_by_id());
//Inicio Función obtener_registro_por_id
function get_measures_by_id(measure_id) {
    $.ajax({
        url: '/get_measures_by_id/' + measure_id,
        type: 'GET',
        data: {
            id: measure_id,
        },
        success: function(measure_id) {
            console.log(measure_id);
            for (var i = 0; i < measure_id.length; i++) {
                // $("#price").val(measure_id[i].sell_price);
                // $("#stock").val(measure_id[i].stock);
                $("#medidas").val(measure_id[i].measure_id);
                // $("#bar_code").val(measure_id[i].bar_code);
            }
        },
    });
}; //Fin de la función get_measures_by_id
//Inicio Función change
$(document).on('change', '#measure_id', function() {
    var valorResultado = $(this).val();
    if (valorResultado != "") {
        get_measures_by_id(valorResultado);
    } else {
        get_measures_by_id();
    }
}); //Fin de la función change*/

// Función para agregar productos a la tabla
function agregar() {
    datosProducto = $("#product_id").val();
    product_id = datosProducto[0];
    producto = $("#product_id option:selected").text();
    quantity = $("#quantity").val();
    discount = $("#discount").val();
    price = $("#price").val();
    stock = $("#stock").val();
    impuesto = $("#tax").val();
    if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "") {
        if (parseInt(stock) >= parseInt(quantity)) {
            subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
            total = total + subtotal[cont];
            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td> <td> <input type="hidden" name="price[]" value="' + parseFloat(price).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(price).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="discount[]" value="' + parseFloat(discount) + '"> <input class="form-control" type="number" value="' + parseFloat(discount) + '" disabled> </td> <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input type="number" value="' + quantity + '" class="form-control" disabled> </td> <td align="right">' + new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD'
            }).format(subtotal[cont]) + '</td></tr>';
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
}; //Fin de la función agregar
//Función limpiar
function limpiar() {
    $("#quantity").val("");
    $("#discount").val("0");
    $("#bar_code").val("");
}; //Fin de la función limpiar
//Función totales
function totales() {
    $("#total").html("$ " + total.toFixed(2));
    total_impuesto = total * impuesto / 100;
    total_pagar = total + total_impuesto;
    $("#total_impuesto").html(new Intl.NumberFormat('en-Us', {
        style: 'currency',
        currency: 'USD'
    }).format(total_impuesto));
    $("#total_pagar_html").html(new Intl.NumberFormat('en-Us', {
        style: 'currency',
        currency: 'USD'
    }).format(total_pagar));
    $("#total_pagar").val(total_pagar.toFixed(2));
}; //Fin de la función totales
//Función evaluar
function evaluar() {
    if (total > 0) {
        $("#guardar").show();
    } else {
        $("#guardar").hide();
    }
}; //Fin de la función evaluar
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
}
  </script> --}}
@endsection