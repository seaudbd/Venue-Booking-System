<?php

namespace App\Http\Requests\Admin\Operation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlockedBookingDateBulkRequest extends FormRequest
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
            'day' => [
                'required',
                'string'
            ],
            'year' => [
                'required',
                'date_format:Y'
            ],
            'venue_id' => [
                'required',
                'numeric'
            ],
            'start_time' => [
                'required',
                'date_format:H:i:s',
                function($attribute, $value, $fail) {
                    if (date_format(date_create($value), 'H:i:s') >= date_format(date_create($this->end_time), 'H:i:s')) {
                        $fail('Start Time Must be Less than the End Time!');
                    }
                }
            ],
            'end_time' => [
                'required',
                'date_format:H:i:s',
                function($attribute, $value, $fail) {
                    if (date_format(date_create($value), 'H:i:s') <= date_format(date_create($this->start_time), 'H:i:s')) {
                        $fail('End Time Must be Greater than the Start Time!');
                    }
                }
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
            'narrative' => [
                'nullable',
                'string',
                'max:255'
            ]
        ];
    }
}
