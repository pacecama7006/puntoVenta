<?php

namespace App\Http\Requests\Product;

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
            'name'        => 'string|required|string|max:100|unique:products',
            'code'        => 'unique:products',
            'slug'        => 'string|unique:products',
            'bar_code'    => 'unique:products',
            'description' => 'required|string|min:10|max:255',
            'image'       => 'mimes:jpg,bmp,png,jpeg',
            'sell_price'  => 'required',
            'provider_id' => 'integer|required|exists:providers,id',
            'category_id' => 'integer|required|exists:categories,id',
        ];
    }
}
