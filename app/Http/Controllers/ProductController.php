<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:products.index')->only('index');
        $this->middleware('can:products.edit')->only('edit', 'update');
        $this->middleware('can:products.create')->only('create', 'store');
        $this->middleware('can:products.show')->only('show');
        $this->middleware('can:products.detroy')->only('detroy');
        $this->middleware('can:product.file')->only('getImagen');
        $this->middleware('can:products.status')->only('change_status');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::get();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /*Recupero datos de las categorías y los proveedores que tenemos en la bd para poder pasárselos a la vista y poder utilizarlos. El método pluck me va a generar un array, tomándo el campo nombre de cada objeto y como segundo parámetro le pasamos que propiedad del objeto queremos que sea la llave del array, en este caso, el id*. Esta forma es para poder pasár el valor de los roles en forma de array llave-valor y utilizarlo en en campo de tipo select*/
        $categories = Category::pluck('name', 'id');
        $providers  = Provider::pluck('name', 'id');
        return view('admin.product.create', compact('categories', 'providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        //Recogo datos del formulario
        $code        = $request->input('code');
        $name        = $request->input('name');
        $slug        = $request->input('slug');
        $bar_code    = $request->input('bar_code');
        $description = $request->input('description');
        $image_path  = $request->file('image');
        $sell_price  = $request->input('sell_price');
        $category_id = $request->input('category_id');
        $provider_id = $request->input('provider_id');

        //asigno valores al objeto
        $producto              = new Product();
        $producto->name        = $name;
        $producto->slug        = $slug;
        $producto->code        = $code;
        $producto->bar_code    = $bar_code;
        $producto->description = $description;
        $producto->sell_price  = $sell_price;
        $producto->category_id = $category_id;
        $producto->provider_id = $provider_id;

        //Si hay una imagen en el formulario
        if ($request->hasFile('image')) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            // Storage::put('images', $image_path_name, File::get($image_path));
            Storage::disk('productos')->put($image_path_name, File::get($image_path));
            $producto->image = 'productos/' . $image_path_name;
        }

        $producto->save();

        if ($request->input('code') == '') {
            $producto->update([
                'code' => $producto->id . '-' . substr($producto->category->name, 0, 3),
            ]);
        }

        if ($request->input('bar_code') == '') {
            $producto->update([
                'bar_code' => $producto->id . '-' . substr($producto->category->name, 0, 3),
            ]);
        }

        return redirect()->route('products.index')->with(['message' => 'El registro se ha guardado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        /*Recupero datos de las categorías y los proveedores que tenemos en la bd para poder pasárselos a la vista y poder utilizarlos. El método pluck me va a generar un array, tomándo el campo nombre de cada objeto y como segundo parámetro le pasamos que propiedad del objeto queremos que sea la llave del array, en este caso, el id*. Esta forma es para poder pasár el valor de los roles en forma de array llave-valor y utilizarlo en en campo de tipo select*/
        $categories = Category::pluck('name', 'id');
        $providers  = Provider::pluck('name', 'id');
        return view('admin.product.edit', compact('product', 'categories', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        //Valido formulario
        /*$request->validate([
        'code'        => 'string|unique:products',
        'name'        => 'required|string|unique:products',
        'slug'        => 'string|unique:products',
        'bar_code'    => 'string|unique:products',
        'description' => 'required|string',
        'image'       => 'mimes:jpg,bmp,png,jpeg',
        'sell_price'  => 'required',
        'provider_id' => 'required',
        'category_id' => 'required',
        ]);*/

        //Recogo datos del formulario
        $id          = (int) $request->input('id');
        $code        = $request->input('code');
        $name        = $request->input('name');
        $slug        = $request->input('slug');
        $bar_code    = $request->input('bar_code');
        $description = $request->input('description');
        $image_path  = $request->file('image');
        $sell_price  = $request->input('sell_price');
        $category_id = $request->input('category_id');
        $provider_id = $request->input('provider_id');

        //asigno valores al objeto
        $producto              = Product::find($id);
        $producto->code        = $code;
        $producto->name        = $name;
        $producto->slug        = $slug;
        $producto->bar_code    = $bar_code;
        $producto->description = $description;
        $producto->sell_price  = $sell_price;
        $producto->category_id = $category_id;
        $producto->provider_id = $provider_id;

        /*Forma de subir una imagen nueva y además borrar la imagen anterior en el disco
        creado en laravel images*/
        if ($image_path && $image_path != $producto->image) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            $imagen_anterior = substr($producto->image, 10);
            //Elimino la imágen del storage accediendo al disco donde están guardadas
            // y paso el método delete con el objeto imágen y su propiedad image_path
            Storage::disk('productos')->delete($imagen_anterior);
            Storage::disk('productos')->put($image_path_name, File::get($image_path));
            $producto->image = 'productos/' . $image_path_name;
        }

        # Actualizo registros en la bd
        $producto->update();

        // $product->update($request->all());
        return redirect()->route('products.index')->with(['message' => 'El registro se actualizó con éxito.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index')->with(['message' => 'El registro fué eliminado correctamente.']);
    }

    /*Método que me permite obtener las imágenes del disco images creado en storage*/
    public function getImagen($filename)
    {
        # creo variable que obtiene del storage, del disco users el archivo, mediante petición http
        $file = Storage::disk('productos')->get($filename);
        /*Retorno el valor obtenido con código 200 que es que sí lo obtuvo. Tengo que tener importada la librería
        use Illuminate\Http\Response;*/

        return new Response($file, 200);
    }

    public function change_status(Product $product)
    {
        //
        if ($product->status == 'ACTIVE') {
            $product->update(['status' => 'DEACTIVATED']);
            return redirect()->back();
        } else {
            $product->update(['status' => 'ACTIVE']);
            return redirect()->back();
        }

    }

    public function pdfProducts()
    {
        # code...
        $products = Product::all();
        $pdf      = PDF::loadView('admin.product.products_pdf', compact('products'));
        return $pdf->download('Listado_productos.pdf');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'Listado_productos.xlsx');
    }

    //Función que permite obtener datos del lector de código de barras
    public function get_products_by_barcode(Request $request)
    {

        if ($request->ajax()) {
            $products = Product::where('code', $request->code)->firstOrFail();
            return response()->json($products);
            /*return response()->json([
            'products' => $products,
            ]);*/
            // return response(json_encode($products), 200)->header('Content-type', 'text/plain');
        }
    }

    /*public function get_products_by_barcode(Request $request)
    {

    if ($$request->ajax()) {
    $products = Product::where('bar_code', $request->bar_code)->firstOrFail();
    return response()->json($products);
    }
    }*/

    public function get_products_by_id(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }

    public function print_barcode()
    {
        $products = Product::get();
        $pdf      = PDF::loadView('admin.product.barcode', compact('products'));
        return $pdf->download('codigos_de_barras.pdf');
    }
}
