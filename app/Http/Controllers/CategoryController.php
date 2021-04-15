<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExport;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:categories.index')->only('index');
        $this->middleware('can:categories.edit')->only('edit', 'update');
        $this->middleware('can:categories.create')->only('create', 'store');
        $this->middleware('can:categories.show')->only('show');
        $this->middleware('can:categories.detroy')->only('detroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
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
        $request->validate([
            'name'        => "required|string|unique:categories",
            'description' => "required",
            'slug'        => "required|string|unique:categories,slug",
        ]);
        //Creo y almaceno el objeto categoria
        Category::create($request->all());

        /*return redirect()->route('admin.categorias.edit', $categoria)->with(['message' => 'El registro se ha guardado exitosamente']);*/
        return redirect()->route('categories.index')->with(['message' => 'El registro se ha guardado exitosamente.']);

        // Category::create($request->all());
        // return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *Muy poco que mostrar, mejor no aplico el método y cancelo la vista
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function show(Category $category)
    {
        //
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Category $category)
    {
        //
        $request->validate([
            'name'        => "required|string|unique:categories,$category->id",
            'description' => 'required',
            'slug'        => "required|string|unique:categories,slug,$category->id",
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with(['message' => 'El registro se actualizó con éxito.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('categories.index')->with(['message' => 'El registro fué eliminado correctamente.']);
    }

    public function pdfCategories()
    {
        # code...
        $categories = Category::all();
        $pdf        = PDF::loadView('admin.category.categories_pdf', compact('categories', ));
        return $pdf->download('Listado_categorías.pdf');
    }

    public function export()
    {
        return Excel::download(new CategoryExport, 'Listado_categorías.xlsx');
    }
}
