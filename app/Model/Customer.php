<?php

namespace App\Model;

use App\Model\Customer\CustomerBooking;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];
    protected $table = 'customers';

    public function customerBookings()
    {
        return $this->hasMany(CustomerBooking::class);
    }
}
