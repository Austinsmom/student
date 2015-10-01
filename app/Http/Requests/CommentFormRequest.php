<?php

namespace App\Http\Requests;

use MyHtml;
use App\Http\Requests\Request;


class CommentFormRequest extends Request
{

    public function messages()
    {

        return [
            'spam_test' => 'This :attribute is a test'
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

        $input = $this->all();

        $input['content'] = MyHtml::sanitize($input['content']);

        $this->replace($input);

        // todo add spam validation
        return [
            'email'        => 'email|required',
            'content'      => 'required',
            'post_id'      => 'integer',
            'published_at' => 'regex:/[0-9]{4}\-[0-9]{2}\-[0-9]{2} [0-9]{2}\:[0-9]{2}\:[0-9]{2}/',
        ];
    }


}
