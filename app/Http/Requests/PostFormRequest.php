<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostFormRequest extends Request
{

    public function messages()
    {
        return [
            'in' => 'Ce champ :attribute doit être du types: :values',
            'required' => 'Ce champ :attribute est obligatoire',
            'max' => 'Le titre ne doit pas dépassé 255 caractères',
            'status.required' => 'Le statut est un champ obligatoire'
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
            'title'        => 'required|string|max:255',
            'published_at' => 'date_format:Y-m-d',
            'status'       => 'required|in:published,unpublished',
            'category_id'  => 'integer'

        ];
    }
}
