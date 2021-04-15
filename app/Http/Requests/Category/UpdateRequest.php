<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        // $category = $this->route()->parameter('category');
        return [
            //
            'name'        => 'required|string|unique:categories,name,' . $this->route('category')->id . '|max:50',
            'description' => 'required|string|max:250',
        ];
    }

    /*Función para que devuelva mensajes*/
    public function message()
    {
        # code...
        return [
            'name.required'        => 'El campo nombre es obligatorio.',
            'name.string'          => 'El cambo nombre debe ser una cadena de texto.',
            'name.max'             => 'En el campo nombre sólo se permiten máximo 50 caracteres.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.string'   => 'El cambo descripción debe ser una cadena de texto.',
            'description.max'      => 'En el campo descripción sólo se permiten máximo 250 caracteres.',
        ];

    }
}
