<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.show')->only('show');
        $this->middleware('can:users.detroy')->only('detroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lo voy a hacer con livewire, ahí paso los usuarios
        //return view('admin.user.index');

        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Traigo todos los roles solamente porque al asignar un rol, se asigna un permiso
        //automáticamente
        $roles = Role::all();

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creo al usuario que me mandan por formulario
        $user = User::create($request->all());
        //Encripto el password
        $password = $request->input('password');
        //Encrippto con la facade Hash (que tengo que importar) y su método make, al cual
        //se le pasa lo que trae el formulario en el campo  password
        $user->fill([
            'password' => Hash::make($password),
        ])->save();
        /*Accedo al objeto usuario que me manda la vista, y a través de él a su relación
        y a través de la relación roles de spatie/permision/models/Role accedo al método sync para asignar los roles seleccionados  en la vista edit y al método le paso lo que trae
        el formulario a través del request en el campo roles*/
        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with(['message' => 'El registro se ha guardado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //Traemos todos los roles en la bd. Tengo que importar la clase use Spatie\Permission\Models\Role;
        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->update($request->all());

        /*Accedo al objeto usuario que me manda la vista, y a través de él a su relación
        y a través de la relación roles de spatie/permision/models/Role accedo al método sync para asignar los roles seleccionados  en la vista edit y al método le paso lo que trae
        el formulario a través del request en el campo roles*/
        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with(['message' => 'El registro se actualizó con éxito.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('users.index')->with(['message' => 'El registro fué eliminado correctamente.']);
    }

    public function pdfUsers()
    {
        # code...
        $users = User::with('roles')->get();
        $pdf   = PDF::loadView('admin.user.users_pdf', compact('users'));
        return $pdf->download('Listado_usuarios.pdf');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'Listado_usuarios.xlsx');
    }
}
