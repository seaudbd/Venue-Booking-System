<?php

namespace App\Http\Requests\Customer;

use App\Model\Admin\Configuration\Venue;
use App\Model\Admin\Operation\BlockedBookingDate;
use App\Model\Customer\CustomerBooking;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookingRequest extends FormRequest
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
            'venue_id' => 'required|numeric',
            'arrival_date_time' => [
                'required',
                'date_format:Y-m-d H:i',
                'after_or_equal:' . date('Y-m-d H:i'),
                function ($attribute, $value, $fail) {
                    if (($value . ':00' < $this->starting_date_time . ':00') || ($value . ':00' > $this->ending_date_time . ':00')) {
                        $fail('The Arrival Date Time must be within Starting and Ending Date Time!');
                    }
                }
            ],
            'starting_date_time' => [
                'required',
                'date_format:Y-m-d H:i',
                'before_or_equal:arrival_date_time',
                'after_or_equal:' . date('Y-m-d H:i'),
                function ($attribute, $value, $fail) {
                    if ( !empty (CustomerBooking::
                        where('venue_id', $this->venue_id)
                        ->where(function ($query) {
                            $query->where('status', 'Reserved');
                            $query->orWhere('status', 'Booked');
                        })
                        ->whereBetween($attribute, [$value . ':00', $this->ending_date_time . ':00'])
                        ->first())) {
                        $fail('The Starting Date Time Found within another Reservation Date and Time!');
                    }
                },
                function ($attribute, $value, $fail) {
                    if ( ! empty(BlockedBookingDate::
                        where('venue_id', $this->venue_id)
                        ->where('date', explode(' ', $value)[0])
                        ->where('start_time', '<=', explode(' ', $value)[1] . ':00')
                        ->where('end_time', '>=', explode(' ', $value)[1] . ':00')
                        ->where('status', 'Active')
                        ->first())) {
                        $fail('The Starting Date Time Found in Blocked Date Time!');
                    }
                },
            ],
            'ending_date_time' => [
                'required',
                'date_format:Y-m-d H:i',
                'after_or_equal:arrival_date_time',
                'after:starting_date_time',
                function ($attribute, $value, $fail) {
                    if ( !empty (CustomerBooking::
                        where('venue_id', $this->venue_id)
                        ->where(function ($query) {
                            $query->where('status', 'Reserved');
                            $query->orWhere('status', 'Booked');
                        })
                        ->whereBetween($attribute, [$this->starting_date_time . ':00', $value . ':00'])
                        ->first())) {
                        $fail('The Ending Date Time Found within another Reservation Date and Time!');
                    }
                },
                function ($attribute, $value, $fail) {
                    if ( ! empty(BlockedBookingDate::
                        where('venue_id', $this->venue_id)
                        ->where('date', explode(' ', $value)[0])
                        ->where('start_time', '<=', explode(' ', $value)[1] . ':00')
                        ->where('end_time', '>=', explode(' ', $value)[1] . ':00')
                        ->where('status', 'Active')
                        ->first())) {
                        $fail('The Ending Date Time Found in Blocked Date Time!');
                    }
                },
            ],
            'number_of_children' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    $venue = Venue::where('id', $this->venue_id)->first();
                    if (($this->number_of_children + $this->number_of_adult) > $venue->number_of_guests) {
                        $fail('The Venue Allowed Guests Exceeded Your Entranced Total Number of Guests!');
                    }
                }
            ],
            'number_of_adult' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    $venue = Venue::where('id', $this->venue_id)->first();
                    if (($this->number_of_children + $this->number_of_adult) > $venue->number_of_guests) {
                        $fail('The Venue Allowed Guests Exceeded Your Entranced Total Number of Guests!');
                    }
                }
            ],
            'terms_and_condition' => [
                'required',
                function($attribute, $value, $fail) {
                    if ($value !== 'Checked') {
                        $fail('You must agree with the terms and condition!');
                    }
                }
            ]
        ];
    }
}
