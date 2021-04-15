<?php

namespace App\Http\Requests\Sale;

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
            'sale_date' => 'required|date',
            'num_vta'   => 'required|integer|unique:sales,num_vta',
            'client_id' => 'integer|required|exists:clients,id',
        ];
    }
}
