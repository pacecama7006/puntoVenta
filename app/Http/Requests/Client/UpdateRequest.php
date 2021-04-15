<?php

namespace App\Http\Requests\Client;

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
        return [
            //
            'name'       => 'required|string|max:50',
            'rfc_number' => 'required|string|min:12|unique:clients,rfc_number,' . $this->route('client')->id . '|max:15',
            'address'    => 'required|string|max:255|min:10',
            'phone'      => 'required|string|unique:clients,phone,' . $this->route('client')->id . '|max:15',
            'email'      => 'required|string|email|unique:clients,email,' . $this->route('client')->id . '|max:100',
        ];
    }
}
