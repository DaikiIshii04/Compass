<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
     *  rules()の前に実行される
     *       $this->merge(['key' => $value])を実行すると、
     *       フォームで送信された(key, value)の他に任意の(key, value)の組み合わせをrules()に渡せる
     */
    public function getValidatorInstance()
    {
        // 個別で誕生日のデータを取得
        $old_year = $this->input('old_year');
        $old_month = $this->input('old_month');
        $old_day = $this->input('old_day');
        // 誕生日データの結合
        $birth_day = ($old_year . '-' . $old_month . '-' . $old_day);
        $this->merge([
            'birth_day' => $birth_day,
        ]);

        return parent::getValidatorInstance();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|max:30|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'under_name_kana' => 'required|string|max:30|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'mail_address' => 'required|email|max:100|unique:users',
            'sex' => 'required|in:1,2,3',
            'role' => 'required|in:1,2,3,4',
            'subject[]' => 'exits:subjects,subject',
            'birth_day' => 'required|date|before:today|after_or_equal:2000-01-01',
            'password' => 'required|min:8|max:30|confirmed',
            'password_confirmation' => 'required',
        ];
    }
        public function messages(){
        return [
            'over_name.max' => '姓は１０文字以内で入力して下さい',
            'over_name.string' => '文字列で入力して下さい',
            'over_name.required' => '必ず入力して下さい',
            'under_name.max' => '名は１０文字以内で入力して下さい',
            'under_name.string' => '文字列で入力して下さい',
            'under_name.required' => '必ず入力して下さい',
            'over_name_kana.required' => '必ず入力して下さい',
            'over_name_kana.string' => '文字列で入力して下さい',
            'over_name_kana.max' => '30字以内で入力して下さい',
            'over_name_kana.regex' => 'カタカナで入力して下さい',
            'under_name_kana.required' => '必ず入力して下さい',
            'under_name_kana.string' => '文字列で入力して下さい',
            'under_name_kana.max' => '30字以内で入力して下さい',
            'under_name_kana.regex' => 'カタカナで入力して下さい',
            'mail_address.required' => '必ず入力して下さい',
            'mail_address.email' => 'メールアドレス形式のみ有効です',
            'mail_address.max' => '100文字以内で入力して下さい',
            'mail_address.unique:users' => '既に使われているアドレスです',
            'sex.required' => '必ず入力してください',
            'sex.in' => '男性、女性、その他のみ有効',
            'role.required' => '必ず入力してください',
            'role.in' => '上記より選択して下さい',
            'birth_day.after_or_equal' => '2000年1月1日以降で入力して下さい',
            'full_data.today'  => '存在しない日付です。',
            'password.required' => '必ず入力して下さい',
            'password.min' => '8文字以上で入力して下さい',
            'password.max' => '30字以内で入力して下さい',
            'password.confirmed' => '確認用パスワードと不一致',
            'password_confirmation.required' => '必ず入力して下さい',
        ];
    }
}
