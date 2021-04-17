<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $ventas_mes = Sale::where('status', 'VALID')
            ->whereMonth('sale_date', \Carbon\Carbon::now())->sum('total');

        $productosvendidos = DB::select('SELECT p.code as code,
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p
        inner join sale_details dv on p.id=dv.product_id
        inner join sales v on dv.sale_id=v.id where v.status="VALID"
        and year(v.sale_date)=year(curdate())
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');

        return view('ptoventa', compact('compras_mes', 'ventas_mes', 'productosvendidos'));

    }

}
