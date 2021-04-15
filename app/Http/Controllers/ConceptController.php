<?php

namespace App\Http\Controllers;

use App\Exports\ConceptExport;
use App\Models\Concept;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ConceptController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:concepts.index')->only('index');
        $this->middleware('can:concepts.edit')->only('edit');
        $this->middleware('can:concepts.update')->only('update');
        $this->middleware('can:concepts.create')->only('create');
        $this->middleware('can:concepts.destroy')->only('destroy');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $concepts = Concept::get();
        return view('admin.concept.index', compact('concepts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.concept.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'concepto' => 'required|string|unique:concepts',
            'slug'     => 'required|string|unique:concepts',
            'tipo'     => 'required',
        ]);

        Concept::create($request->all());

        return redirect()->route('concepts.index')->with(['message' => 'El registro se ha guardado exitosamente.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Concept  $concept
     * @return \Illuminate\Http\Response
     */
    /*public function show(Concept $concept)
    {
    //
    return view('admin.concept.show', compact('concept'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Concept  $concept
     * @return \Illuminate\Http\Response
     */
    public function edit(Concept $concept)
    {
        //
        return view('admin.concept.edit', compact('concept'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Concept  $concept
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concept $concept)
    {
        //
        $request->validate([
            'concepto' => "required|string|unique:concepts,concepto,$concept->id",
            'slug'     => "required|string|unique:concepts,slug,$concept->id",
            'tipo'     => 'required',
        ]);
        $concept->update($request->all());
        return redirect()->route('concepts.index')->with(['message' => 'El registro se actualizó con éxito.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Concept  $concept
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concept $concept)
    {
        //
        $concept->delete();
        return redirect()->route('concepts.index')->with(['message' => 'El registro fué eliminado correctamente.']);
    }

    public function pdfConcepts()
    {
        # code...
        $concepts = Concept::all();
        $pdf      = PDF::loadView('admin.concept.concepts_pdf', compact('concepts'));
        return $pdf->download('Listado_conceptos.pdf');
    }

    public function export()
    {
        return Excel::download(new ConceptExport, 'Listado_conceptos.xlsx');
    }
}
