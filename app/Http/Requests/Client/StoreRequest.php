<?php

namespace App\Http\Requests\Client;

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
            'name'       => 'required|string|max:50',
            'rfc_number' => 'required|string|max:15|min:12|unique:clients',
            'address'    => 'required|string|max:255|min:10',
            'phone'      => 'required|string|max:15|unique:clients',
            'email'      => 'required|string|email|max:100|unique:clients',
        ];
    }
}
