<?php

namespace App\Http\Requests\Customer;

use App\Model\Customer;
use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
            'current_password' => [
                'required',
                function($attribute, $value, $fail) {

                    if ( empty(Customer::where('login_id', session('login_id'))->where('password', sha1($value))->first())) {
                        $fail('Invalid Current Password!');
                    }
                }
            ],
            'password' => [
                'required',
                'min:8',
                'max:32',
                'confirmed'
            ]
        ];
    }
}
