<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Measure;
use App\Models\Product;
use App\Models\Provider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PruebaVentaController extends Controller
{
    //
    public function index()
    {
        $clients   = Client::pluck('name', 'id');
        $num_vta   = DB::table('sales')->max('num_vta');
        $num_vta   = $num_vta + 1;
        $fecha_vta = Carbon::now('America/Mexico_City');
        //$products = Product::get();
        $products = Product::where('status', 'ACTIVE')->get();
        return view('pruebaVenta', compact('clients', 'products', 'num_vta', 'fecha_vta'));

        //Para hacer prueba con Compras
        // $medidas = Measure::pluck('simbolo', 'id');
        // $medidas = Measure::all();
        /* $medidas = Product::where('status', 'ACTIVE')->get();
        $medidas = $medidas->fresh('measure');*/
        //dd($medidas);
        $num_compra   = DB::table('purchases')->max('num_compra');
        $num_compra   = $num_compra + 1;
        $fecha_compra = Carbon::now('America/Mexico_City');
        $providers    = Provider::pluck('name', 'id');
        //$products     = Product::where('status', 'ACTIVE')->pluck('name', 'id');
        $products = Product::where('status', 'ACTIVE')->get();
        // $products = $products->fresh('measure');
        //return view('pruebaCompra', compact('providers', 'products', 'num_compra', 'fecha_compra');
        //return $this->get_products_by_barcode('2-Coc');
        //return $this->get_products_by_id(1);
    }

    //Función que permite obtener datos del lector de código de barras
    public function get_products_by_barcode(Request $request)
    {

        if ($request->ajax()) {
            $producto = Product::where('bar_code', $request->bar_code)->get();
            $producto = $producto->fresh('measure');
        }

        return response()->json($producto);
    }

    /*public function get_products_by_barcode(Request $request)
    {

    if ($$request->ajax()) {
    $products = Product::where('bar_code', $request->bar_code)->firstOrFail();
    return response()->json($products);
    }
    }*/

    /*public function get_products_by_id(Request $request)
    {
    if ($request->ajax()) {
    $products = Product::findOrFail($request->product_id);
    return response()->json($products);
    }
    }*/

    public function get_products_by_id(Request $request)
    {
        if ($request->ajax()) {
            //$products = Product::findOrFail($request->id);
            $producto = Product::where('id', $request->id)->get();
            $producto = $producto->fresh('measure');
            // return response()->json($producto);
        }
        return response()->json($producto);
    }

    public function get_measures_by_id(Request $request)
    {
        if ($request->ajax()) {
            //$products = Product::findOrFail($request->id);
            $medida = Measure::where('id', $request->id)->get();
            return response()->json($medida);
        }
    }
}
