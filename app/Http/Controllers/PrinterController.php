<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use Illuminate\Http\Request;

class PrinterController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:printer.index')->only('index');
        $this->middleware('can:printer.update')->only('update', 'edit');
    }

    public function index()
    {
        # Así porque sólo tengo 1 impresora cargada
        $printer = Printer::first();
        return view('admin.printer.index', compact('printer'));
    }

    public function update(Request $request, Printer $printer)
    {
        # code...
        $printer->update($request->all());
        return redirect()->route('printer.index')->with(['message' => 'El registro se actualizó con éxito.']);
    }
}
