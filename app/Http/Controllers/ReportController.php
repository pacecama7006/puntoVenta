<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:sales.reports.day')->only('reports_day');
        $this->middleware('can:sales.reports.date')->only('reports_date');
        $this->middleware('can:sales.report.result')->only('report_result');
        /*$this->middleware('can:purchases.reports.purchases.day')->only('reports_purchases_day');
    $this->middleware('can:purchases.reports.purchases.date')->only('reports_purchases_date');
    $this->middleware('can:purchases.report.purchases.result')->only('report_purchases_result');*/
    }
    //funcíon que obtiene las ventas por día
    public function reports_day()
    {
        # Obtengo las ventas del día comparandao la fecha saleDate con carbon today
        $sales = Sale::whereDate('sale_date', Carbon::today('America/Mexico_City'))->get();
        //Obtengo la suma total de la columna total
        $total = $sales->sum('total');
        return view('admin.report.reports_day', compact('sales', 'total'));
    }

    //Función que permite las ventas por fecha
    public function reports_date()
    {
        # code...
        $sales = Sale::whereDate('sale_date', Carbon::today('America/Mexico_City'))->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_date', compact('sales', 'total'));
    }

    //Función que obtiene las ventas por fechas
    public function report_result(Request $request)
    {
        # code...
        $f_inicio = $request->fecha_ini . ' 00:00:00';
        $f_fin    = $request->fecha_fin . ' 23:59:59';
        $sales    = Sale::whereBetween('sale_date', [$f_inicio, $f_fin])->get();
        $total    = $sales->sum('total');
        return view('admin.report.reports_date', compact('sales', 'total'));
    }

    //funcíon que obtiene las compras por día
    public function reports_purchases_day()
    {
        # Obtengo las ventas del día comparandao la fecha saleDate con carbon today
        $purchases = Purchase::whereDate('purchase_date', Carbon::today('America/Mexico_City'))->get();
        //Obtengo la suma total de la columna total
        $total = $purchases->sum('total');
        return view('admin.report.reports_purchases_day', compact('purchases', 'total'));
    }

    //Función que permite las compras por fecha
    public function reports_purchases_date()
    {
        # code...
        $purchases = Purchase::whereDate('purchase_date', Carbon::today('America/Mexico_City'))->get();
        $total     = $purchases->sum('total');
        return view('admin.report.reports_purchases_date', compact('purchases', 'total'));
    }

    //Función que obtiene las compras por fechas
    public function report_purchases_result(Request $request)
    {
        # code...
        $f_inicio  = $request->fecha_ini . ' 00:00:00';
        $f_fin     = $request->fecha_fin . ' 23:59:59';
        $purchases = Purchase::whereBetween('purchase_date', [$f_inicio, $f_fin])->get();
        $total     = $purchases->sum('total');
        return view('admin.report.reports_purchases_date', compact('purchases', 'total'));
    }

}
