<?php

namespace App\Http\Controllers;

use App\Exports\MoveExport;
use App\Models\Box;
use App\Models\Concept;
use App\Models\Move;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class MoveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        /*$this->middleware('can:moves.index')->only('index');
    $this->middleware('can:moves.edit')->only('edit');
    $this->middleware('can:moves.update')->only('update');
    $this->middleware('can:moves.create')->only('create');
    $this->middleware('can:moves.destroy')->only('destroy');
    $this->middleware('can:moves.show')->only('show');*/
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $moves = Move::get();
        return view('admin.move.index', compact('moves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $boxes    = Box::pluck('name', 'id');
        $concepts = Concept::pluck('concepto', 'id');

        return view('admin.move.create', compact('boxes', 'concepts'));
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
            'detalle'    => 'required|string',
            'importe'    => 'required',
            'tipo'       => 'required',
            'box_id'     => 'required',
            'concept_id' => 'required',
            'image'      => 'image',
        ]);

        //Creo la fecha del movimiento
        // $fecha_mov = Carbon::now('America/Mexico_City');
        //Obtengo los datos del formulario
        $fecha_mov  = $request->input('fecha_mov');
        $detalle    = $request->input('detalle');
        $importe    = $request->input('importe');
        $tipo       = $request->input('tipo');
        $box_id     = $request->input('box_id');
        $concept_id = $request->input('concept_id');
        $image_path = $request->file('image');
        //Asigno valores
        $movimiento             = new Move();
        $movimiento->fecha_mov  = $fecha_mov;
        $movimiento->detalle    = $detalle;
        $movimiento->importe    = $importe;
        $movimiento->tipo       = $tipo;
        $movimiento->box_id     = $box_id;
        $movimiento->concept_id = $concept_id;

        //Si hay una imagen en el formulario
        if ($request->hasFile('image')) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            Storage::disk('caja')->put($image_path_name, File::get($image_path));
            $movimiento->image = 'caja/' . $image_path_name;
        }

        $movimiento->save();

        return redirect()->route('moves.index')->with(['message' => 'El registro se ha guardado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function show(Move $move)
    {
        //
        return view('admin.move.show', compact('move'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function edit(Move $move)
    {
        //
        $boxes    = Box::pluck('name', 'id');
        $concepts = Concept::pluck('concepto', 'id');

        return view('admin.move.edit', compact('move', 'boxes', 'concepts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Move $move)
    {
        //Obtengo los datos del formulario
        $fecha_ant = $move->fecha_mov;
        // $id         = (int) $request->input('id');
        $fecha_mov  = $request->input('fecha_mov');
        $detalle    = $request->input('detalle');
        $importe    = $request->input('importe');
        $conciliado = (int) $request->input('conciliado');
        $tipo       = $request->input('tipo');
        $box_id     = $request->input('box_id');
        $concept_id = $request->input('concept_id');
        $image_path = $request->file('image');
        //Asigno valores
        // $movimiento             = Move::find($id);

        $move->detalle    = $detalle;
        $move->importe    = $importe;
        $move->conciliado = $conciliado;
        $move->tipo       = $tipo;
        $move->box_id     = $box_id;
        $move->concept_id = $concept_id;

        if ($request->input('fecha_mov') == "") {
            $move->fecha_mov = $fecha_ant;
        } else {
            $move->fecha_mov = $fecha_mov;
        }

        //Si hay una imagen en el formulario
        if ($request->hasFile('image')) {
            if ($image_path && $image_path != $move->image) {
                $image_path_name = time() . $image_path->getClientOriginalName();
                $imagen_anterior = substr($move->image, 5);
                Storage::disk('caja')->delete($imagen_anterior);
                Storage::disk('caja')->put($image_path_name, File::get($image_path));
                $move->image = 'caja/' . $image_path_name;
            }

        }

        $move->update();

        // $move->update($request->all());
        return redirect()->route('moves.index')->with(['message' => 'El registro se actualizó con éxito.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function destroy(Move $move)
    {
        //
        $move->delete();
        return redirect()->route('moves.index')->with(['message' => 'El registro fué eliminado correctamente.']);

    }

    public function pdfMoves()
    {
        # code...
        $moves = Move::all();
        $pdf   = PDF::loadView('admin.move.moves_pdf', compact('moves'));
        return $pdf->download('Listado_moviimientos.pdf');
    }

    public function export()
    {
        return Excel::download(new MoveExport, 'Listado_movimientos.xlsx');
    }

    public function change_conciliado(Move $move)
    {
        //
        if ($move->conciliado == 0) {
            $move->update(['conciliado' => 1]);
            return redirect()->back();
        } else {
            $move->update(['conciliado' => 0]);
            return redirect()->back();
        }

    }

}
