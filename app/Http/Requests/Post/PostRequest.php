<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|min:3|max:45|',
            'description' => 'required|min:10|max:500',
            'is_publish' => 'required',
            'is_active' => 'required'
        ];
    }
}
