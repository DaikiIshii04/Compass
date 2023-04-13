<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentCategoryFormRequest extends FormRequest
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
            'comment'=>'required|max:2|string',
        ];
    }
    public function messages(){
        return [
            'comment.required'=>'入力必須です',
            'comment.max'=>'コメントは2500文字以内で入力して下さい',
            'comment.string'=>'文字列で入力して下さい',
        ];
    }
}
