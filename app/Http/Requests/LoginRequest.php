<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'needle'   => 'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'needle.required'   => 'El usuario o correo son requeridos',
            'password.required' => 'La contraseña es requerida'
        ];
    }
}
