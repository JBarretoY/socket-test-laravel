<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkExpRequest extends FormRequest
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
            'name'         => 'required|string',
            'company_name' => 'required|string',
            'description'  => 'required|string',
            'at_present'   => 'required|boolean',
            'date_from'    => 'required|date',
            'date_to'      => 'required|after:date_from'
        ];
    }
}
