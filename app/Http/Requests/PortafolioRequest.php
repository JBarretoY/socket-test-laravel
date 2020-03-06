<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortafolioRequest extends FormRequest
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
            'name'        => 'required|string',
            'description' => 'required|string',
            'file'        => 'required|array',
            'categories'  => 'required|array'
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'El nombre es requerido',
            'name.string'          => 'El nombre debe ser una cadena de caracteres',
            'description.required' => 'El descripción es requerido',
            'description.string'   => 'El descripción debe ser una cadena de caracteres',
            'file.required'        => 'El campo archivo es requerido',
            'file.array'           => 'debe ser al menos un archivo',
            'categories.required'  => 'El campo categoria es requerido',
            'categories.array'     => 'Debe contener al menos una categoria'
        ];
    }
}
