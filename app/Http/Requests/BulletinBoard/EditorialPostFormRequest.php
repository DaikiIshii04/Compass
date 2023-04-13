<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditorialPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        'post_title' => 'required|min:4|max:100',
        'post_body' => 'required|min:10|max:5000',
        ];
    }
        public function messages()
    {
        return [
            'post_title.required' => 'タイトルを記入してください。',
            'post_title.min' => 'タイトルは4文字以上記入してください。',
            'post_title.max' => 'タイトルは100文字以内にしてください。',
            'post_body.required' => '投稿内容を記入してください。',
            'post_body.min' => '投稿内容は10文字以上記入してください。',
            'post_body.max' => '投稿内容を500文字以内にしてください。',
        ];
    }
}
