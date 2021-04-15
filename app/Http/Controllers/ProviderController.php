<?php

namespace App\Http\Controllers;

use App\Exports\ProvidersExport;
use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;
use App\Models\Provider;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:providers.index')->only('index');
        $this->middleware('can:providers.edit')->only('edit', 'update');
        $this->middleware('can:providers.create')->only('create', 'store');
        $this->middleware('can:providers.show')->only('show');
        $this->middleware('can:providers.detroy')->only('detroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $providers = Provider::get();
        return view('admin.provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.provider.create');
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
        Provider::create($request->all());
        return redirect()->route('providers.index')->with(['message' => 'El registro se ha guardado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
        return view('admin.provider.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        //
        return view('admin.provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Provider $provider)
    {
        //
        $provider->update($request->all());
        return redirect()->route('providers.index')->with(['message' => 'El registro se actualizó con éxito.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        //
        $provider->delete();
        return redirect()->route('providers.index')->with(['message' => 'El registro fué eliminado correctamente.']);
    }

    public function pdfProviders()
    {
        # code...
        $providers = Provider::all();
        $pdf       = PDF::loadView('admin.provider.providers_pdf', compact('providers'));
        return $pdf->download('Listado_proveedores.pdf');
    }

    public function export()
    {
        return Excel::download(new ProvidersExport, 'Listado_proveedores.xlsx');
    }
}
