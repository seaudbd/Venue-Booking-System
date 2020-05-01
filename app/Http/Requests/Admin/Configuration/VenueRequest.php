<?php

namespace App\Http\Requests\Admin\Configuration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VenueRequest extends FormRequest
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
            'id' => 'nullable|numeric',
            'venue' => 'required|max:255|unique:venues,venue,' . $this->id,
            'type' => [
                'required',
                Rule::in(['Regular', 'Casual', 'Assembly'])
            ],
            'price_per_hour' => 'required|numeric',
            'security_deposit_amount' => 'required|numeric',
            'number_of_rooms' => 'required|numeric',
            'number_of_seats' => 'required|numeric',
            'number_of_guests' => 'required|numeric',
            'cleaning_fee' => 'nullable|numeric',
            'city_fee' => 'nullable|numeric',
            'refund_policy' => 'nullable|max:65000',
            'are_children_allowed' => [
                'required',
                Rule::in(['Yes', 'No'])
            ],
            'is_additional_guest_allowed' => [
                'required',
                Rule::in(['Yes', 'No'])
            ],
            'is_smoking_allowed' => [
                'required',
                Rule::in(['Yes', 'No'])
            ],
            'is_party_allowed' => [
                'required',
                Rule::in(['Yes', 'No'])
            ],
            'is_pet_allowed' => [
                'required',
                Rule::in(['Yes', 'No'])
            ],

            'background_color' => [
                'required',
                'string',
                'max:7',
                'min:7'
            ],
            'text_color' => [
                'required',
                'string',
                'max:7',
                'min:7'
            ],
            'status' => [
                'required',
                Rule::in(['Active', 'Inactive'])
            ],
            'narrative' => 'nullable|max:255'
        ];
    }
}
