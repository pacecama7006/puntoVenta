<?php

namespace App\Http\Requests\Product;

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
        /*'name'        => 'string|required|string|unique:products,name,' . $this->route('product')->id . '|max:100',*/
        return [
            //
            'slug'        => 'string|unique:products,slug,' . $this->route('product')->id,
            'name'        => 'string|required|string|max:100|unique:products,name,' . $this->route('product')->id,
            'bar_code'    => 'string|unique:products,bar_code,' . $this->route('product')->id,
            'code'        => 'string|unique:products,code,' . $this->route('product')->id,
            // 'description' => 'required|string|min:10|max:255',
            'image'       => 'mimes:jpg,bmp,png,jpeg',
            'sell_price'  => 'required|between:0,99.99',
            'provider_id' => 'integer|required|exists:providers,id',
            'category_id' => 'integer|required|exists:categories,id',
            'measure_id'  => 'integer|required|exists:measures,id',
        ];
    }
}
