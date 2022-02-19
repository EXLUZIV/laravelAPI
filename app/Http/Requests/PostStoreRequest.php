<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
        $rules =  [
            'worker_id' => 'required|integer|max:255',
            'post_title' => 'required|max:255',
            'post_content' => 'required|max:255',
        ];

        switch ($this->getMethod())
        {
            case 'POST' :
                return $rules;
            case 'PUT' :
                return [
                    'id' => 'required|integer|exits:post,id',
                    'title' => [
                        'required',
                        Rule::unique('post')->ignore($this->post_title, 'post_title')
                    ]
                ] + $rules;

            case 'DELETE' :
                return [
                    'id' => 'required|integer|exists:worker,id'
                ];
        }
    }
}
