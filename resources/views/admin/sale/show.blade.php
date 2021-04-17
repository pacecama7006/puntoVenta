@extends('layouts.admin')
@section('title','Detalles_de_venta')
@section('styles')

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalles de venta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('ptoventa') }}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles de venta</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group row">
                    	<div class="col-md-3 text-center">
                            <label class="form-control-label" for="nombre"><strong>Fecha venta</strong></label>
                            <p>{{date('d-m-Y',strtotime($sale->sale_date))}}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <label class="form-control-label" for="nombre"><strong>Cliente</strong></label>
                            <p>{{$sale->client->name}}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Número Venta</strong></label>
                            <p>{{$sale->num_vta }}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Vendedor</strong></label>
                            <p>{{$sale->user->name}}</p>
                        </div>
                    </div>
                    <br /><br />
                    <div class="form-group row ">
                        <h4 class="card-title ml-3">Detalles de venta</h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Descuento</th>
                                        <th align="right">SubTotal</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">SUBTOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="left">$ {{number_format($subtotal,2,'.',',')}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL IMPUESTO ({{$sale->tax}}%):</p>
                                        </th>
                                        <th>
                                            <p align="left">$ {{number_format($subtotal*$sale->tax/100,2,'.',',')}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="left">$ {{number_format($sale->total,2,'.',',')}}</p>
                                        </th>
                                    </tr>

                                </tfoot>
                                <tbody>
                                    @foreach($saleDetails as $saleDetail)
                                    <tr>
                                        <td>{{$saleDetail->product->name }}</td>
                                        <td>$ {{number_format($saleDetail->price,2,'.',',')}}</td>
                                        <td>{{$saleDetail->quantity}}</td>
                                        <td>{{$saleDetail->discount}}</td>
                                        <td align="left">$ {{number_format($saleDetail->quantity*$saleDetail->price - $saleDetail->quantity*$saleDetail->price*$saleDetail->discount/100,2,'.', ',')}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('sales.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js')
	<script type="text/javascript" src="{{ asset('melody/js/data-table.js') }}"></script>
	<script type="text/javascript" src="{{ asset('melody/js/profile-demo.js') }}"></script>

@endsection