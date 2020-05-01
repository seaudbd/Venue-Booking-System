<?php

namespace App\Http\Requests;

use App\Model\Customer;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => [
                'required',
                'max:255'
            ],
            'company_name' => [
                'required',
                'max:255'
            ],
            'contact_number' => [
                'required',
                'max:255'
            ],
            'address' => [
                'required',
                'max:1000'
            ],
            'login_id' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fail('Invalid Email Format Found!');
                    }
                    if ( ! empty(Customer::where('login_id', $value)->first())) {
                        $fail('This Log in ID has Already been Taken!');
                    }
                }
            ],
            'password' => [
                'required',
                'min:8',
                'max:20',
                'confirmed'
            ]
        ];
    }
}
