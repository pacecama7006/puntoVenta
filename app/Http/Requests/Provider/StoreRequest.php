<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'       => 'required|string|max:255|unique:providers',
            'email'      => 'required|email|string|max:200|unique:providers',
            'rfc_number' => 'required|string|max:15|min:12|unique:providers',
            'adress'     => 'required|string|max:255',
            'phone'      => 'required|string|max:15|min:12|unique:providers',
        ];
    }

    /*Función para que devuelva mensajes*/
    public function message()
    {
        # code...
        return [
            'name.required'       => 'El campo nombre es obligatorio.',
            'name.string'         => 'El cambo nombre debe ser una cadena de texto.',
            'name.max'            => 'En el campo nombre sólo se permiten máximo 255 caracteres.',
            'email.required'      => 'El campo email es obligatorio.',
            'email.email'         => 'El campo email no es formato de correo.',
            'email.string'        => 'El cambo email debe ser una cadena de texto.',
            'email.max'           => 'En el campo email sólo se permiten máximo 200 caracteres.',
            'email.unique'        => 'Este correo electrónico ya se encuentra registrado.',
            'rfc_number.required' => 'El campo rfc es obligatorio.',
            'rfc_number.string'   => 'El cambo rfc debe ser una cadena de texto.',
            'rfc_number.min'      => 'El campo rfc permite mínimo 12 caracteres.',
            'rfc_number.max'      => 'En el campo rfc sólo permiten máximo 15 caracteres.',
            'rfc_number.unique'   => 'Este rfc ya se encuentra registrado.',
            'adress.required'     => 'El campo dirección es obligatorio.',
            'adress.string'       => 'El cambo dirección debe ser una cadena de texto.',
            'adress.max'          => 'En el campo dirección sólo se permiten máximo 255 caracteres.',
            'phone.required'      => 'El campo teléfono es obligatorio.',
            'phone.string'        => 'El cambo teléfono debe ser una cadena de texto.',
            'phone.min'           => 'El campo teléfono permite mínimo 10 caracteres.',
            'phone.max'           => 'En el campo teléfono sólo permiten máximo 15 caracteres.',
            'phone.unique'        => 'Este teléfono ya se encuentra registrado.',
        ];

    }
}
