<?php

namespace App\Model\Admin\Configuration;

use App\Model\Customer\CustomerBooking;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $guarded = [];
    protected $table = 'venues';
    public function customerBookings()
    {
        return $this->hasMany(CustomerBooking::class);
    }

    public function venueOpeningHours()
    {
        return $this->hasMany(VenueOpeningHour::class);
    }
}
