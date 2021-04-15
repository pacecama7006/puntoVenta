<?php

namespace App\Http\Controllers;

use App\Http\Requests\Business\UpdateRequest;
use App\Models\Business;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:business.index')->only('index');
        $this->middleware('can:business.update')->only('update');
    }

    public function index()
    {
        # code...
        $business = Business::first();
        //var_dump($business);
        return view('admin.business.index', compact('business'));
    }

    public function update(UpdateRequest $request, Business $business)
    {
        //Recogo datos del formulario
        //$id = (int) $request->input('id');
        //$code        = $request->input('code');
        $name        = $request->input('name');
        $description = $request->input('description');
        $rfc         = $request->input('rfc');
        $adress      = $request->input('adress');
        $phone       = $request->input('phone');
        $email       = $request->input('email');
        $image_path  = $request->file('logo');
        // var_dump($business);
        // die();
        //asigno valores al objeto, por ser única empresa asigno el 1
        //$business              = Business::find(1);
        $business->name        = $name;
        $business->description = $description;
        $business->rfc         = $rfc;
        $business->adress      = $adress;
        $business->phone       = $phone;
        $business->email       = $email;

        /*Forma de subir una imagen nueva y además borrar la imagen anterior en el disco
        creado en laravel images*/
        if ($image_path && $image_path != $business->logo) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            $imagen_anterior = substr($business->logo, 5);
            //Elimino la imágen del storage accediendo al disco donde están guardadas
            // y paso el método delete con el objeto imágen y su propiedad image_path
            Storage::disk('logo')->delete($imagen_anterior);
            Storage::disk('logo')->put($image_path_name, File::get($image_path));
            $business->logo = 'logo/' . $image_path_name;
        }

        $business->update();
        return redirect()->route('business.index')->with(['message' => 'El registro se actualizó con éxito.']);
    }
}
