<?php

namespace App\Http\Requests\Customer;

use App\Model\Customer;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fail('Invalid Email Format Found!');
                    }
                    if ( ! empty(Customer::where('email', $value)->where('id', '!=', session('session_id'))->first())) {
                        $fail('This Email has Already been Taken!');
                    }
                }
            ],
            'contact_number' => 'nullable|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png|max:1024',
        ];
    }
}
