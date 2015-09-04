<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventRequest extends Request
{

    public function messages()
    {
        return [
            'required' => 'Ce champ :attribute est obligatoire',
            'email'    => 'Mauvaise syntaxe d\'email ',
        ];
    }

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
            'name'  => 'required',
            'email' => 'required|email'
        ];
    }
}
