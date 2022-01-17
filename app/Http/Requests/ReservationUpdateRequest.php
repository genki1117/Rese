<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationUpdateRequest extends FormRequest
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
            'date.required' => '※日時を入力してください',
            'time.required' => '※時間を入力してください',
            'number_of_people.required' => '※人数を入力してください'
        ];
    }
}
