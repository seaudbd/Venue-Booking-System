<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendVerificationCodeRequest extends FormRequest
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
            'login_id' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fail('Invalid Email Format Found!');
                    }
                }
            ]
        ];
    }
}
