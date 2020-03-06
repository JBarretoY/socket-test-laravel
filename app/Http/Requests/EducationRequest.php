<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'institution' => 'required|string',
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
            'institution.required' => 'La institución es requerido',
            'institution.string'   => 'La institución debe ser una cadena de caracteres',
            'date_from.required'   => 'La fecha de inicio es requerida',
            'date_from.date'       => 'La fecha debe tener un formato valido',
            'date_to.required'     => 'La fecha hasta es requerida',
            'date_to.after'        => 'La fecha hasta debe ser mayor a la fecha de inicio',
            'description.required' => 'La descripción es requerida',
            'description.string'   => 'La descripcion debe ser una cadena de caracteres'
         ];
    }
}
