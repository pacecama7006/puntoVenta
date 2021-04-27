<?php

namespace App\Http\Controllers;

use App\Exports\PurchaseDetalleExport;
use App\Exports\PurchasesExport;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Purchase;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class PurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:purchases.index')->only('index');
        $this->middleware('can:purchases.edit')->only('edit', 'update');
        $this->middleware('can:purchases.create')->only('create', 'store');
        $this->middleware('can:purchases.show')->only('show');
        $this->middleware('can:purchases.detroy')->only('detroy');
        $this->middleware('can:purchases.pdf_detalle')->only('pdf_detalle');
        $this->middleware('can:purchases.upload')->only('upload');
        $this->middleware('can:purchases.status')->only('change_status');
        // $this->middleware('can:purchases.user_id')->only('purchases_by_user_id');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Compras para el superAdmin y para el Administrador
        $purchases = Purchase::get();

        return view('admin.purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $num_compra   = DB::table('purchases')->max('num_compra');
        $num_compra   = $num_compra + 1;
        $fecha_compra = Carbon::now('America/Mexico_City');
        $providers    = Provider::pluck('name', 'id');
        //$products     = Product::where('status', 'ACTIVE')->pluck('name', 'id');
        $products = Product::where('status', 'ACTIVE')->get();
        // dd($products->keys());
        // $providers = Provider::get();
        return view('admin.purchase.create', compact('providers', 'products', 'num_compra', 'fecha_compra'));
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
        //Con Carbon recupero dia, hora y fecha
        $purchase_date = Carbon::now('America/Mexico_City');
        $num_compra    = DB::table('purchases')->max('num_compra');
        $num_compra    = $num_compra + 1;
        //dd($num_compra);
        //Traigo datos del formulario
        //$purchase_date = $request->input('purchase_date');
        //$num_compra  = $request->input('num_compra');
        $tax         = $request->input('tax');
        $total       = $request->input('total');
        $provider_id = $request->input('provider_id');
        $image_path  = $request->input('picture');
        // dd($image_path);
        //asigno valores al objeto
        $compra                = new Purchase();
        $compra->purchase_date = $purchase_date;
        $compra->num_compra    = $num_compra;
        $compra->tax           = $tax;
        $compra->total         = $total;
        $compra->provider_id   = $provider_id;
        $compra->user_id       = $user_id;

        //Si hay una imagen en el formulario
        /*if ($request->hasFile('image')) {
        $image_path_name = time() . $image_path->getClientOriginalName();
        Storage::disk('compras')->put($image_path_name, File::get($image_path));
        $compra->picture = 'compras/' . $image_path_name;
        }*/

        $compra->save();

        /*$purchase = Purchase::create($request->all() + [
        'user_id'       => $user_id,
        'purchase_date' => $purchase_date,
        ]);*/

        foreach ($request->product_id as $key => $product) {
            $results[] = array(
                "product_id" => $request->product_id[$key],
                "quantity"   => $request->quantity[$key],
                "price"      => $request->price[$key]);
        }
        //El purchase_Id se llena automáticamente con la creación del purchase al principio
        $compra->purchaseDetails()->createMany($results);
        $compra->products()->attach($results);

        if (\Auth::user()->hasAnyRole('SuperAdmin', 'Administrador')) {
            return redirect()->route('purchases.index')->with(['message' => 'El registro se ha guardado exitosamente.']);
        }
        if (\Auth::user()->hasRole('Comprador')) {
            return redirect()->route('purchases.user_id', $user_id)->with(['message' => 'El registro se ha guardado exitosamente.']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        $subtotal = 0;
        //Obtengo los detalles de la compra
        $purchaseDetails = $purchase->purchaseDetails;
        //Obtengo sub-totales de la compra
        foreach ($purchaseDetails as $purchaseDetail) {
            //Con += sumo cada uno de los subtotales en la iteración
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        //o bien
        //$purchaseDetails = $purchase->products;

        return view('admin.purchase.show', compact('purchase', 'subtotal', 'purchaseDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
        $providers = Provider::get();
        return view('admin.purchase.edit', compact('purchase', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Purchase $purchase)
    {
        //
        /*$purchase->update($request->all());
    return redirect()->route('purchases.index')->with(['message' => 'El registro se actualizó con éxito.']);*/

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
        /*$purchase->delete();
    return redirect()->route('purchases.index')->with(['message' => 'El registro fué eliminado correctamente.']);*/

    }

    public function pdf_detalle(Purchase $purchase)
    {
        # code...
        $subtotal = 0;
        //Obtengo los detalles de la compra
        $purchaseDetails = $purchase->purchaseDetails;
        //Obtengo sub-totales de la compra
        foreach ($purchaseDetails as $purchaseDetail) {
            //Con += sumo cada uno de los subtotales en la iteración
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        $pdf = PDF::loadView('admin.purchase.detalle_pdf', compact('purchase', 'subtotal', 'purchaseDetails'));
        return $pdf->download('Detalle_Compra_' . $purchase->id . ' .pdf');
    }

    //Función que devuelve el detalle de una compra en excel
    public function excel_detalle(Purchase $purchase)
    {

        $purchase = $purchase;

        //$purchase->purchaseDetails;
        //dd($purchase);
        return Excel::download(new PurchaseDetalleExport($purchase), 'Detalle_compra.xlsx');
    }

    public function upload(Request $request, Purchase $purchase)
    {
        //
        //Recogo datos del formulario
        $id         = (int) $request->input('id');
        $image_path = $request->file('picture');

        /*Forma de subir una imagen nueva y además borrar la imagen anterior en el disco
        creado en laravel images*/
        if ($image_path && $image_path != $purchase->picture) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            $imagen_anterior = substr($purchase->picture, 10);
            //Elimino la imágen del storage accediendo al disco donde están guardadas
            // y paso el método delete con el objeto imágen y su propiedad image_path
            Storage::disk('compras')->delete($imagen_anterior);
            Storage::disk('compras')->put($image_path_name, File::get($image_path));
            $purchase->picture = 'compras/' . $image_path_name;
        }

        # Actualizo registros en la bd
        $purchase->update();
        /*$purchase->update($request->all());
    return redirect()->route('purchases.index')->with(['message' => 'El registro se actualizó con éxito.']);*/

    }

    public function change_status(Purchase $purchase)
    {
        //

        if ($purchase->status == 'VALID') {
            $purchase->update(['status' => 'CANCELED']);
            /*$purchase->products()->update(['stock' => $stockCancelado]);*/
            return redirect()->back();
        } else {
            $purchase->update(['status' => 'VALID']);
            /*$purchase->products()->update(['stock' => $soctkReactivado]);*/
            return redirect()->back();
        }

    }

    public function pdfPurchases()
    {
        # code...
        $purchases = Purchase::all();
        $pdf       = PDF::loadView('admin.purchase.purchases_pdf', compact('purchases'));
        return $pdf->download('Listado_compras.pdf');
    }

    public function export()
    {
        return Excel::download(new PurchasesExport, 'Listado_compras.xlsx');
    }

    public function purchases_by_user_id(User $user)
    {
        # code...
        $purchases_com = Purchase::where('user_id', $user->id)->get();
        return view('admin.purchase.index', compact('purchases_com'));
    }

    function print(Purchase $purchase) {
        try {
            $subtotal        = 0;
            $purchaseDetails = $purchase->purchaseDetails;
            foreach ($purchaseDetails as $purchaseDetails) {
                $subtotal += $purchaseDetails->quantity * $purchaseDetails->price;
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

}
