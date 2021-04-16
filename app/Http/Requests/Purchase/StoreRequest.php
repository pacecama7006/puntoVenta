<?php

namespace App\Http\Requests\Purchase;

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
            'purchase_date' => 'required|date',
            'num_compra'    => 'required|integer|unique:purchases,num_compra',
            'provider_id'   => 'integer|required|exists:providers,id',
        ];
    }
}
