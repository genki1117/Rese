<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'review_number' => 'required',
            'comment' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'review_number.required' => '※評価を選択してください',
            'comment.required' => '※コメントが未入力です'
        ];
    }
}
