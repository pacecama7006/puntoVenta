<?php

namespace App\Http\Controllers;

use App\Exports\SaleDetalleExport;
use App\Exports\SalesExport;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:sales.index')->only('index');
        $this->middleware('can:sales.edit')->only('edit', 'update');
        $this->middleware('can:sales.create')->only('create', 'store');
        $this->middleware('can:sales.show')->only('show');
        $this->middleware('can:sales.detroy')->only('detroy');
        $this->middleware('can:sales.pdf_detalle')->only('pdf_detalle');
        $this->middleware('can:sales.print')->only('print');
        $this->middleware('can:sales.status')->only('change_status');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $num_vta   = DB::table('sales')->max('num_vta');
        $num_vta   = $num_vta + 1;
        $fecha_vta = Carbon::now('America/Mexico_City');
        $clients   = Client::pluck('name', 'id');
        //$products = Product::pluck('name', 'id');
        $products = Product::get();
        return view('admin.sale.create', compact('clients', 'products', 'num_vta', 'fecha_vta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $user_id = \Auth::user()->id;
        // $user_id = Auth::user()->id;
        $num_vta   = DB::table('sales')->max('num_vta');
        $num_vta   = $num_vta + 1;
        $fecha_vta = Carbon::now('America/Mexico_City');
        //Traigo datos del formulario
        $tax       = $request->input('tax');
        $total     = $request->input('total');
        $client_id = $request->input('client_id');
        //Creo la compra y asigno valores
        $sale            = new Sale();
        $sale->sale_date = $fecha_vta;
        $sale->num_vta   = $num_vta;
        $sale->user_id   = $user_id;
        $sale->tax       = $tax;
        $sale->total     = $total;
        $sale->client_id = $client_id;
        //Guardo los cambios
        $sale->save();

        /*$sale = Sale::create($request->all() + [
        'user_id' => $user_id,
        'sale_date' => $fecha_vta,
        'num_vta '  => $num_vta,
        ]);*/

        foreach ($request->product_id as $key => $product) {
            # code...
            $results[] = array(
                'product_id' => $request->product_id[$key],
                'quantity'   => $request->quantity[$key],
                'price'      => $request->price[$key],
                'discount'   => $request->discount[$key],
            );

        }
        //El purchase_Id se llena automáticamente con la creación del sale al principio
        $sale->saleDetails()->createMany($results);
        //Almaceno en productgables
        $sale->products()->attach($results);

        return redirect()->route('sales.index')->with(['message' => 'El registro se ha guardado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
        $subtotal    = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100;
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
        /*$subtotal = 0;
        //Obtengo los detalles de la compra
        $saleDetails = $sale->saleDetails;
        //Obtengo sub-totales de la compra
        foreach ($saleDetails as $saleDetail) {
        //Con += sumo cada uno de los subtotales en la iteración
        $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100;
        }*/
        //o bien
        //$saleDetails = $sale->products;
        return view('admin.sale.show', compact('sale', 'subtotal', 'saleDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
        $clients = Client::get();
        return view('admin.sale.show', compact('sale', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Sale $sale)
    {
        //
        /*$sale->update($request->all());
    return redirect()->route('sales.index')->with(['message' => 'El registro se actualizó con éxito.']);*/

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
        /*$sale->delete();
    return redirect()->route('sales.index')->with(['message' => 'El registro fué eliminado correctamente.']);*/
    }

    public function pdf_detalle(Sale $sale)
    {
        # code...
        $subtotal = 0;
        //Obtengo los detalles de la compra
        $saleDetails = $sale->saleDetails;
        //Obtengo sub-totales de la compra
        foreach ($saleDetails as $saleDetail) {
            //Con += sumo cada uno de los subtotales en la iteración
            $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100;
        }

        $pdf = PDF::loadView('admin.sale.detalle_pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('Detalle_Venta_' . $sale->id . ' .pdf');
    }

    //Función que devuelve el detalle de una compra en excel
    public function excel_detalle(Sale $sale)
    {

        $sale = $sale;

        //$sale->saleDetails;
        //dd($sale);
        return Excel::download(new SaleDetalleExport($sale), 'Detalle_venta.xlsx');
    }

    function print(Sale $sale) {
        try {
            $subtotal    = 0;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100;
            }
            //Se crea una variable con el nombre de la impresora
            $printer_name = "TM20";
            $connector    = new WindowsPrintConnector($printer_name);
            $printer      = new Printer($connector);
            //Aquí tendría que meter el código que se imprime, queda pendiente, lo que dejo
            //Es un ejemplo
            $printer->text("$ 9,95\n");
            //Aquí se corta la impresión
            $printer->cut();
            $printer->close();

            return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function change_status(Sale $sale)
    {
        if ($sale->status == 'VALID') {
            $sale->update(['status' => 'CANCELED']);
            return redirect()->back();
        } else {
            $sale->update(['status' => 'VALID']);
            return redirect()->back();
        }
    }

    public function pdfSales()
    {
        # code...
        $sales = Sale::all();
        $pdf   = PDF::loadView('admin.sale.sales_pdf', compact('sales'));
        return $pdf->download('Listado_ventas.pdf');
    }

    public function export()
    {
        return Excel::download(new SalesExport, 'Listado_ventas.xlsx');
    }

}
