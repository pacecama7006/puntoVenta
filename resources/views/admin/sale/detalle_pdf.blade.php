<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de venta</title>
<style>
    body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
        font-size: 14px;
        /*font-family: SourceSansPro;*/
    }
    #datos {
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
    }
    #encabezado {
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
    }
    #fact {
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        background: #33AFFF;
    }
    section {
        clear: left;
    }
    #cliente {
        text-align: left;
    }
    #faproveedor {
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }
    #fac,
    #fv,
    #fa {
        color: #FFFFFF;
        font-size: 15px;
    }
    #faproveedor thead {
        padding: 20px;
        background: #33AFFF;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
    }
    #facvendedor {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }
    #facvendedor thead {
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }
    #facproducto {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }
    #facproducto thead {
        padding: 20px;
        background: #33AFFF;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }
</style>

<body>

    <header>
        {{--  <div id="logo">
            <img src="img/logo.png" alt="" id="imagen">
        </div>  --}}
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <th id="">DATOS DEL CLIENTE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">Nombre: {{$sale->client->name}}<br>
                                {{--  {{$sale->provider->document_type}}-COMPRA: {{$sale->provider->document_number}}<br>  --}}
                                R.F.C.: {{$sale->client->rfc_number}}<br>
                                Dirección: {{$sale->client->address}}<br>
                                Teléfono: {{$sale->client->phone}}<br>
                                Email: {{$sale->client->email}}</p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact">
            {{--  <p>{{$sale->client->document_type}} VENTA<br />
                {{$sale->client->document_number}}</p>  --}}
                <p>NUMERO DE VENTA<br/>
                    {{$sale->num_vta }}</p>
        </div>
    </header>
    <br>


    <br>
    <section>
        <div>
            <table id="facvendedor">
                <thead>
                    <tr id="fv">
                        <th>VENDEDOR</th>
                        <th>FECHA VENTA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">{{$sale->user->name}}</td>
                        <td align="center">{{date('d-m-Y',strtotime($sale->sale_date))}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO COMPRA</th>
                        <th>DESCUENTO</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $saleDetail)
                    <tr>
                        <td>{{number_format($saleDetail->quantity,0,'',',')}}</td>
                        <td>{{$saleDetail->product->name}}</td>
                        <td align="right">$ {{number_format($saleDetail->price,2,'.',',')}}</td>
                        <td align="right"> {{number_format($saleDetail->discount,0,'.',',')}}%</td>
                        <td align="right">$ {{number_format($saleDetail->quantity*$saleDetail->price,2,'.',',')}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                    <tr>
                        <th colspan="4">
                            <p align="right">SUBTOTAL:</p>
                        </th>
                        <td>
                            <p align="right">$  {{number_format($subtotal,2,'.',',')}}<p>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL IMPUESTO ({{$sale->tax}}%):</p>
                        </th>
                        <td>
                            <p align="right">$  {{number_format($subtotal*$sale->tax/100,2,'.',',')}}</p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">$  {{number_format($sale->total,2,'.',',')}}<p>
                        </td>
                    </tr>

                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <!--puedes poner un mensaje aqui-->
        <div id="datos">
            <p id="encabezado">
                {{--  <b>{{$company->name}}</b><br>{{$company->description}}<br>Telefono:{{$company->telephone}}<br>Email:{{$company->email}}  --}}
            </p>
        </div>
    </footer>
</body>

</html>