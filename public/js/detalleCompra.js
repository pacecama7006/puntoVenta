//Inicio del otro script
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
var cont = 0;
total = 0;
subtotal = [];
$("#guardar").hide();
$(obtener_registro_por_id());
//Inicio Función obtener_registro_por_id
function obtener_registro_por_id(product_id) {
    //var urlPath = 'http://' + window.location.hostname + '/purchases/get_products_by_id/{product_id}';
    $.ajax({
        /*url: '/purchases/create/get_products_by_id/{product_id}' + product_id,*/
        url: '/get_products_by_id/{product_id}' + product_id,
        type: 'GET',
        data: {
            id: product_id,
        },
        success: function(product_id) {
            console.log(product_id);
            for (var i = 0; i < product_id.length; i++) {
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
    //var urlPath = 'http://' + window.location.hostname + '/purchases/get_products_by_barcode/{bar_code}';
    $.ajax({
        /*url: 'purchases/create/get_products_by_barcode/{bar_code}' + bar_code,*/
        url: '/get_products_by_barcode/{bar_code}' + bar_code,
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
    //return false;
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
        var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td> <td> <input type="hidden" id="price[]" name="price[]" value="' + price + '"> <input class="form-control" type="number" id="price[]" value="' + price + '" disabled> </td>  <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input class="form-control" type="number" value="' + quantity + '" disabled> </td> <td align="right">' + new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
        }).format(subtotal[cont]) + ' </td></tr>';
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
    $("#total").html(new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD'
    }).format(total));
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
}; //Fin de la función eliminar