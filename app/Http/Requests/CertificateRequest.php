<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
            'granted_by'  => 'required|string',
            'date_from'   => 'required|date',
            'date_to'     => 'required|after:date_from',
            'description' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string'   => 'El nombre debe ser una cadena de caracteres',
            'granted_by.required'  => 'El campo concedido es requerido',
            'granted_by.string'    => 'El campo concedido debe ser una cadena de caracteres',
            'date_from.required'   => 'La fecha de inicio debe es requerida',
            'date_from.date'       => 'La fecha de inicio debe debe estar en un formato de valido',
            'date_to.required'     => 'La fecha de final debe es requerida',
            'date_to.after'        => 'La fecha de final mayor a la fecha inicial',
            'description.required' => 'La descripción es requerida',
            'description.string'   => 'La descripción debe ser una cadena de caracteres',
        ];
    }
}
