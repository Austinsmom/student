<?php

namespace App\Http\Requests;

use MyHtml;
use App\Http\Requests\Request;

class CommentFormRequest extends Request
{

    public function messages()
    {

        return [
            'content' => 'This :attribute is required'
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

        // service Aksimet checked content and email
        \Akismet::setCommentContent($input['content'])
            ->setCommentAuthorEmail($input['email']);

        $input['spam'] = (\Akismet::isSpam()) ? 1 : 0;

        $this->replace($input);

        return [
            'email'        => 'email|required',
            'content'      => 'required',
            'post_id'      => 'integer',
            'published_at' => 'regex:/[0-9]{4}\-[0-9]{2}\-[0-9]{2} [0-9]{2}\:[0-9]{2}\:[0-9]{2}/',
        ];
    }

}