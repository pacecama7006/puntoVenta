<?php

namespace App\Http\Controllers;

use App\Exports\ClientExport;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Models\Client;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:clients.index')->only('index');
        $this->middleware('can:clients.edit')->only('edit', 'update');
        $this->middleware('can:clients.create')->only('create', 'store');
        $this->middleware('can:clients.show')->only('show');
        $this->middleware('can:clients.detroy')->only('detroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::get();

        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.client.create');
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
        Client::create($request->all());
        return redirect()->route('clients.index')->with(['message' => 'El registro se ha guardado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
        return view('admin.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
        return view('admin.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Client $client)
    {
        //
        $client->update($request->all());
        return redirect()->route('clients.index')->with(['message' => 'El registro se actualizó con éxito.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        return redirect()->route('clients.index')->with(['message' => 'El registro fué eliminado correctamente.']);
    }

    public function pdfClients($value = '')
    {
        # code...
        $clients = Client::all();
        $pdf     = PDF::loadView('admin.client.clients_pdf', compact('clients', ));
        return $pdf->download('Listado_clientes.pdf');
    }

    public function export()
    {
        return Excel::download(new ClientExport, 'Listado_clientes.xlsx');
    }

    public function detalle_ventas(Client $client)
    {
        $client = $client->sales();
        return view('admin.client.detalle_vta.blade.php', compact('client'));
    }
}
