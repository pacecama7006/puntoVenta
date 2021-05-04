<?php

namespace App\Http\Controllers;

use App\Exports\MeasureExport;
use App\Models\Measure;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MeasureController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:measures.index')->only('index');
        $this->middleware('can:measures.edit')->only('edit', 'update');
        $this->middleware('can:measures.create')->only('create', 'store');
        $this->middleware('can:measures.detroy')->only('detroy');
        $this->middleware('can:measures.pdfMeasures')->only('pdfMeasures');
        $this->middleware('can:measures.export')->only('export');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $measures = Measure::get();
        return view('admin.measure.index', compact('measures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.measure.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'medida'  => 'required|string|unique:measures',
            'simbolo' => 'required|string|unique:measures',
            'slug'    => 'required',
        ]);

        //Obtengo los datos del formulario
        $medida  = $request->input('medida');
        $simbolo = $request->input('simbolo');
        $slug    = $request->input('slug');

        //Asigno valores
        $measure          = new Measure();
        $measure->medida  = $medida;
        $measure->simbolo = $simbolo;
        $measure->slug    = $slug;

        //Guardo valores
        $measure->save();

        return redirect()->route('measures.index')->with(['message' => 'El registro se ha guardado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function show(Measure $measure)
    {
        //
        return view('admin.measure.show', compact('measure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function edit(Measure $measure)
    {
        //

        return view('admin.measure.edit', compact('measure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measure $measure)
    {
        //Valido el formulario
        $request->validate([
            'medida'  => "required|string|unique:measures,medida,$measure->id",
            'simbolo' => "required|string|unique:measures,simbolo,$measure->id",
            'slug'    => 'required',
        ]);
        //Obtengo los datos del formulario
        $medida  = $request->input('medida');
        $simbolo = $request->input('simbolo');
        $slug    = $request->input('slug');
        //Asigno valores
        // $movimiento             = Move::find($id);

        $measure->medida  = $medida;
        $measure->simbolo = $simbolo;
        $measure->slug    = $slug;

        $measure->update();

        // $move->update($request->all());
        return redirect()->route('measures.index')->with(['message' => 'El registro se actualizó con éxito.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measure $measure)
    {
        //
        $measure->delete();
        return redirect()->route('measures.index')->with(['message' => 'El registro fué eliminado correctamente.']);

    }

    public function pdfMeasure()
    {
        # code...
        $measures = Measure::all();
        $pdf      = PDF::loadView('admin.measure.measures_pdf', compact('measures'));
        return $pdf->download('Listado_medidas.pdf');
    }

    public function export()
    {
        return Excel::download(new MeasureExport, 'Listado_medidas.xlsx');
    }

}
