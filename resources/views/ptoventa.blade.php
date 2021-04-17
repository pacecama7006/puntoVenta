@extends('layouts.admin')
@section('title','Panel administrador')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }
</style>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Panel administrador
        </h3>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card text-white bg-warning">

                <div class="card-body pb-0">
                    <div class="float-right">
                        <i class="fas fa-cart-arrow-down fa-4x"></i>
                    </div>
                    <div class="text-value h4"><strong>$ {{number_format($compras_mes,2,'.',',')}} (MES ACTUAL)
                    </strong>
                    </div>
                    <div class="h3">Compras</div>
                </div>
                <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                    <a href="{{route('purchases.index')}}" class="small-box-footer h4">Compras <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>

            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card  text-white bg-info">
                <div class="card-body pb-0">
                    <div class="float-right">
                        <i class="fas fa-shopping-cart fa-4x"></i>
                    </div>
                    <div class="text-value h4">
                        <strong>$ {{number_format($ventas_mes,2,'.',',')}} (MES ACTUAL) </strong>
                    </div>
                    <div class="h3">Ventas</div>
                </div>
                <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                    <a href="{{route('sales.index')}}" class="small-box-footer h4">Ventas
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-chart-line"></i> Tendencia de la venta diaria
        </div>
        <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">
            Actualizado el @php  setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); echo strftime('%d-%B-%Y' , strtotime(date('d-M-Y', time() )))  @endphp
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-bar"></i>Ventas por mes
                    </h4>
                    <canvas id="vtaMensual" width="100%" height="30"></canvas>
                </div>
                <div class="card-footer small text-muted">
                    Actualizado el @php  setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); echo strftime('%d-%B-%Y' , strtotime(date('d-M-Y', time() )))  @endphp
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-bar"></i>Compras por mes
                    </h4>
                    <canvas id="compraMensual" width="100%" height="30"></canvas>
                </div>
                <div class="card-footer small text-muted">
                    Actualizado el @php  setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); echo strftime('%d-%B-%Y' , strtotime(date('d-M-Y', time() )))  @endphp
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-envelope"></i>
                        Productos más vendidos
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th>Nombre</th>
                                    <th>Código</th>
                                    <th>Stock</th>
                                    <th>Cantidad vendida</th>
                                    <th>Ver detalles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productosvendidos as $productosvendido)
                                <tr>
                                    <td>{{$productosvendido->id}}</td>
                                    <td>{{$productosvendido->name}}</td>
                                    <td>{{$productosvendido->code}}</td>
                                    <td><strong>{{$productosvendido->stock}}</strong> Unidades</td>
                                    <td><strong>{{$productosvendido->quantity}}</strong> Unidades</td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{route('products.show', $productosvendido->id)}}">
                                            <i class="far fa-eye"></i>
                                            Ver detalles
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.1.0/dist/chart.min.js"></script>
<script type="text/javascript" src="{{ asset('melody/js/chartist.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/create-chartsVd.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/create-charts.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/create-chartsCM.js') }}"></script>
@endsection
