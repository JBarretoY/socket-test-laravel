<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'     => 'required|string',
            'lastname' => 'required|string',
            'email'    => 'required|unique:App\User,email|email:rfc',
            'phone'    => 'required',
            'password' => 'required',
            'username' => 'required|unique:App\User,username',
            'type'     => 'required|integer',
            'company_name'   => 'required|string',
            'count_personal' => 'required|integer',
            'industry'       => 'required|string',
            'company_email'  => 'required|string|email:rfc',
            'agent'          => 'required|string',
            'company_phone'  => 'required|string',
            'specialist_needed' => 'requied|integer',
            'specialist_type'   => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'El nombre es requerido',
            'name.string'       => 'El nombre es debe ser una cadena de caracteres',
            'lastname.required' => 'El apellido es requerido',
            'lastname.string'   => 'El apellido debe ser una cadena de caracteres',
            'email.required'    => 'El email es requerido',
            'email.unique'      => 'El email introducido está siendo usado',
            'phone.required'    => 'El telefono es requerido',
            'password.required' => 'La contraseña es requerida',
            'username.required' => 'El username es requerido',
            'username.unique'   => 'El username introducido esta siendo usado',
            'type.required'     => 'El tipo de usuario es requerido',
            'type.integer'      => 'El tipo de usuario debe ser numerico',
            'company_name.required'   => 'El nombre de la compañia es requerido',
            'company_name.string'     => 'El nombre de la compañia debe ser una cadena de caracteres',
            'count_personal.required' => 'El numero de personal es requerido',
            'count_personal.integer'  => 'El numero de personal debe ser numerico',
            'industry.required'       => 'La industria debe ser requerida',
            'industry.string'         => 'La industria debe ser una cadena de caracteres',
            'company_email.required'  => 'El email de la compañia es requirido',
            'company_email.email'     => 'El email de la compañia debe ser un email valido',
            'agent.required'          => 'El agent debe es requerida',
            'agent.string'            => 'El agent debe ser una cadena de caracteres',
            'company_phone.required'  => 'El telefono de la compañia es requerido',
            'company_phone.string'    => 'El telefono debe ser una cadena de caracteres',
        ];
    }
}
