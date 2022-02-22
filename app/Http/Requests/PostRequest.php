<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Post $post)
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
            'worker_id' => 'required|integer|max:255',
            'comment_id' => 'required|integer|max:255',
            'post_title' => 'required|max:255',
            'post_content' => 'required|max:255',
            'coment_content' => 'required|max:255',
        ];
    }
}
