<?php

namespace App\Http\Controllers;

use App\Exports\RolesExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.edit')->only('edit', 'update');
        $this->middleware('can:roles.create')->only('create', 'store');
        $this->middleware('can:roles.show')->only('show');
        $this->middleware('can:roles.detroy')->only('detroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $roles = Role::get();
        $roles = Role::where('id', '<>', 1)->get();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Traigo todos los permisos que existen. Tengo que importar la librería use Spatie\Permission\Models\Permission;
        $permissions = Permission::get();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Realizamos validaciones con el método validate
        $request->validate([
            'name' => 'required',
        ]);

        //Recupero la información del formulario y creo el rol
        $role = Role::create($request->all());

        /*Agrego los permisos otorgados al rol accediendo a la relación permissions y  accediendo al metodo sync pasándole como parámetro lo que viene del formulario en el campo persmissions*/

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index', $role)->with(['message' => 'El registro se ha guardado exitosamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        return view('admin.role.show', compact('role'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //Traigo todos los permisos que existen. Tengo que importar la librería use Spatie\Permission\Models\Permission;
        $permissions = Permission::all();
        if ($role->id == 1) {
            return view('admin.role.index');
        } else {
            return view('admin.role.edit', compact('role', 'permissions'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //Realizamos validaciones con el método validate
        $request->validate([
            'name' => 'required',
        ]);

        /*Actualizo el rol con la información que viene del formulario mediante el método update que le paso como parámetro el request*/
        $role->update($request->all());

        /*Agrego los permisos otorgados al rol accediendo a la relación permissions y  accediendo al metodo sync pasándole como parámetro lo que viene del formulario en el campo persmissions*/
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with(['message' => 'El registro se actualizó con éxito.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->id == 1) {
            return redirect()->route('roles.index')->with(['message' => 'Permiso denegado.']);
        } else {
            //Elimino el rol Accediendo al objeto role y con el método delete
            $role->delete();

            return redirect()->route('roles.index')->with(['message' => 'El registro fué eliminado correctamente.']);
        }

    }

    public function pdfRoles()
    {
        # code...
        $roles = Role::all();
        $pdf   = PDF::loadView('admin.role.roles_pdf', compact('roles'));
        return $pdf->download('Listado_roles.pdf');
    }

    public function export()
    {
        return Excel::download(new RolesExport, 'Listado_roles.xlsx');
    }
}
