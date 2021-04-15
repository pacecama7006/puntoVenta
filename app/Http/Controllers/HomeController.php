<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $compras_mes = Purchase::where('status', 'VALID')
            ->whereMonth('purchase_date', \Carbon\Carbon::now())->sum('total');
        //dd($compras_mes);
        $ventas_mes = Sale::where('status', 'VALID')
            ->whereMonth('sale_date', \Carbon\Carbon::now())->sum('total');
        //dd($compras_mes);

        /*$users = DB::table('users')
        ->groupBy('account_id')
        ->having('account_id', '>', 100)
        ->get();*/

        /*$ventasdia = Sale::where('status', 'VALID')
        ->groupBy('sale_date')
        ->get();*/
        $ventasdia = Sale::where('status', 'VALID')
            ->orderBy('sale_date')
            ->take(30)
            ->get('total');
        //dd($ventasdia);

        $comprasmes = DB::select('SELECT month(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by month(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        //dd($comprasmes);
        $ventasmes = DB::select('SELECT month(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALID" group by month(v.sale_date) order by month(v.sale_date) desc limit 12');

        // $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by monthname(c.purchase_date) order by month(c.purchase_date) desc limit 12');
        // $ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALID" group by monthname(v.sale_date) order by month(v.sale_date) desc limit 12');

        $ventasdia = DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, sum(v.total) as totaldia from sales v where v.status="VALID" group by v.sale_date order by day(v.sale_date) desc limit 15');
        //dd($ventasdia);

        /*$totales = DB::select('SELECT (select ifnull(sum(c.total),0) from purchases c where DATE(c.purchase_date)=curdate() and c.status="VALID") as totalcompra, (select ifnull(sum(v.total),0) from sales v where DATE(v.sale_date)=curdate() and v.status="VALID") as totalventa');*/

        $productosvendidos = DB::select('SELECT p.code as code,
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p
        inner join sale_details dv on p.id=dv.product_id
        inner join sales v on dv.sale_id=v.id where v.status="VALID"
        and year(v.sale_date)=year(curdate())
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');

        // return view('ptoventa', compact('comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos'));

        // return view('ptoventa', compact('comprasmes', 'ventasmes', 'ventasdia', 'compras_mes', 'ventas_mes', 'productosvendidos'));

        /* $chart_options = [
        'chart_title'         => 'Ventas diarías',
        'chart_type'          => 'line',
        'report_type'         => 'group_by_date',
        'model'               => 'App\Models\Sale',
        'conditions'          => [
        ['name' => 'Venta', 'color' => 'blue', 'fill' => true],
        ],
        'group_by_field'      => 'created_at',
        'group_by_period'     => 'day',
        'aggregate_function'  => 'sum',
        'aggregate_field'     => 'total',
        'filter_field'        => 'sale_date',
        'filter_days'         => 30, // show only last 30 days
        'date_format'         => 'd-m-Y',
        'aggregate_transform' => function ($value) {
        return round($value / 100, 2);
        },

        ];*/

        $chart_options = [
            'chart_title'        => 'Ventas diarias',
            'report_type'        => 'group_by_date',
            'model'              => 'App\Models\Sale',
            'group_by_field'     => 'created_at',
            'group_by_period'    => 'day',
            'chart_type'         => 'line',
            'filter_field'       => 'sale_date',
            'filter_days'        => 30, // show only last 30 days
            'date_format'        => 'd-m-Y',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'total',
        ];

        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title'        => 'Compras por mes',
            'report_type'        => 'group_by_date',
            'model'              => 'App\Models\Purchase',
            'group_by_field'     => 'created_at',
            'group_by_period'    => 'month',
            'chart_type'         => 'bar',
            'filter_field'       => 'created_at',
            'filter_period'      => 'year',
            'date_format'        => 'd-m-Y',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'total',
            'style_class'        => 'bg-red-300',
        ];

        $chart2 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title'        => 'Ventas por mes',
            'report_type'        => 'group_by_date',
            'model'              => 'App\Models\Sale',
            'group_by_field'     => 'created_at',
            'group_by_period'    => 'month',
            'chart_type'         => 'bar',
            'filter_field'       => 'sale_date',
            'filter_days'        => 30, // show only last 30 days
            'date_format'        => 'd-m-Y',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'total',
        ];

        $chart3 = new LaravelChart($chart_options);

        return view('ptoventa', compact('chart1', 'chart2', 'chart3', 'compras_mes', 'ventas_mes', 'productosvendidos'));

        /*$vtas_diarias = Sale::orderBy('sale_date', 'asc')
        ->groupBy('sale_date');*/
        /*$vtas_diarias->keys();
        return $vtas_diarias->values();*/

        //return view('ptoventa3', compact('vtas_diarias'));
    }
}
