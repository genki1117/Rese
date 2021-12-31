<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class OwnerRegisterRequest extends FormRequest
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
        return [
            'name' => 'required | string | max:255',
            'email' => 'required | email | string | max:255 | unique:owner',
            'password' => 'required',Rules\Password::defaults(),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '※名前を入力してください',
            'email.required' => '※メールアドレスを入力してください',
            'email.email' => '※メールアドレス形式で入力してください',
            'email.unique' => '※このメールアドレスは既に使用済みです',
            'password.required' => '※パスワードを入力してください'
        ];
    }
}
