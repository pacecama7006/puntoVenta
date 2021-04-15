<?php

namespace App\Http\Controllers;

use App\Exports\BoxExport;
use App\Models\Box;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BoxController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:boxes.index')->only('index');
        $this->middleware('can:boxes.edit')->only('edit');
        $this->middleware('can:boxes.update')->only('update');
        $this->middleware('can:boxes.create')->only('create');
        $this->middleware('can:boxes.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $boxes = Box::all();
        return view('admin.box.index', compact('boxes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::pluck('name', 'id');
        return view('admin.box.create', compact('users'));
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
            'name'    => 'required|string|max:50|unique:boxes',
            'user_id' => 'required|int',
        ]);

        Box::create($request->all());
        return redirect()->route('boxes.index')->with(['message' => 'El registro se ha guardado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    /*public function show(Box $box)
    {
    //
    return view('admin.box.show', compact('box'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function edit(Box $box)
    {
        //
        $users = User::pluck('name', 'id');
        return view('admin.box.edit', compact('box', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Box $box)
    {
        //
        $request->validate([
            'name'    => "required|string|max:50|unique:boxes,name,$box->id",
            'user_id' => "required|int",
        ]);

        $box->update($request->all());

        return redirect()->route('boxes.index')->with(['message' => 'El registro se ha guardado exitosamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Box  $box
     * @return \Illuminate\Http\Response
     */
    public function destroy(Box $box)
    {
        //
        $box->delete();

        return redirect()->route('boxes.index')->with(['message' => 'El registro fué eliminado correctamente.']);
    }

    public function pdfBoxes()
    {
        # code...
        $boxes = Box::all();
        $pdf   = PDF::loadView('admin.box.boxes_pdf', compact('boxes'));
        return $pdf->download('Listado_cajas.pdf');
    }

    public function export()
    {
        return Excel::download(new BoxExport, 'Listado_cajas.xlsx');
    }

}
