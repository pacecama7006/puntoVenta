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
    }; //Fin de la función eliminar
    //fin del document ready
});