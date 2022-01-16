<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'date' => 'required',
            'time' => 'required',
            'number_of_people' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '※日付を入力してください',
            'time.date_format' => '※時間を選択してください',
            'number.integer' => '※人数を選択してください'
        ];

    }
}
