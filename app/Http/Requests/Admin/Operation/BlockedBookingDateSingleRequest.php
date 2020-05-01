<?php

namespace App\Http\Requests\Admin\Operation;

use App\Model\Admin\Operation\BlockedBookingDate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlockedBookingDateSingleRequest extends FormRequest
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
            'venue_id' => [
                'required',
                'numeric'
            ],
            'date' => [
                'required',
                'date_format:d-F-Y',
                function ($attribute, $value, $fail) {
                    if ($this->id) {
                        if ( ! empty(BlockedBookingDate::
                            where('date', date_format(date_create($value), 'Y-m-d'))
                            ->where('venue_id', $this->venue_id)
                            ->where('start_time', '<=', $this->start_time)
                            ->where('end_time', '>=', $this->start_time)
                            ->where('id', '!=', $this->id)
                            ->first())) {
                            $fail('Duplicate Date Found!');
                        }

                        if ( ! empty(BlockedBookingDate::
                            where('date', date_format(date_create($value), 'Y-m-d'))
                            ->where('venue_id', $this->venue_id)
                            ->where('start_time', '<=', $this->end_time)
                            ->where('end_time', '>=', $this->end_time)
                            ->where('id', '!=', $this->id)
                            ->first())) {
                            $fail('Duplicate Date Time Found for the Venue You Selected!');
                        }

                        if ( ! empty(BlockedBookingDate::
                            where('date', date_format(date_create($value), 'Y-m-d'))
                            ->where('venue_id', $this->venue_id)
                            ->where(function ($query) {
                                $query->whereBetween('start_time', [$this->start_time, $this->end_time]);
                                $query->orWhereBetween('end_time', [$this->start_time, $this->end_time]);
                            })
                            ->where('id', '!=', $this->id)
                            ->first())) {
                            $fail('Duplicate Date Time Found fo the Venue You Selected!');
                        }


                    } else {
                        if ( ! empty(BlockedBookingDate::
                            where('date', date_format(date_create($value), 'Y-m-d'))
                            ->where('venue_id', $this->venue_id)
                            ->where('start_time', '<=', $this->start_time)
                            ->where('end_time', '>=', $this->start_time)
                            ->first())) {
                            $fail('Duplicate Date Time Found for the Venue You Selected!');
                        }
                        if ( ! empty(BlockedBookingDate::
                            where('date', date_format(date_create($value), 'Y-m-d'))
                            ->where('venue_id', $this->venue_id)
                            ->where('start_time', '<=', $this->end_time)
                            ->where('end_time', '>=', $this->end_time)
                            ->first())) {
                            $fail('Duplicate Date Time Found for the Venue You Selected!');
                        }

                        if ( ! empty(BlockedBookingDate::
                            where('date', date_format(date_create($value), 'Y-m-d'))
                            ->where('venue_id', $this->venue_id)
                            ->where(function ($query) {
                                $query->whereBetween('start_time', [$this->start_time, $this->end_time]);
                                $query->orWhereBetween('end_time', [$this->start_time, $this->end_time]);
                            })
                            ->first())) {
                            $fail('Duplicate Date Time Found for the Venue You Selected!');
                        }
                    }
                },
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
