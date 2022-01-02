<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class AdminCreateRequest extends FormRequest
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
            'email' => 'required | string | email | max:255 | unique:admins',
            'password' => 'required', Rules\Password::default(),
            'shop_id' => 'required | unique:admins,shop_id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '※登録者名が未入力です',
            'email.required' => '※メールアドレスが未入力です',
            'email.unique' => '※既にメールアドレスが使われています',
            'password.required' => '※パスワードが未入力です',
            'shop_id.required' => '※ショップが未選択です',
            'shop_id.unique' => '※既に登録済みです'
        ];
    }
}
