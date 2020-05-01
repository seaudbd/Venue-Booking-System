<?php

namespace App\Model\Customer;

use App\Model\Admin\Configuration\Venue;
use App\Model\Customer;
use Illuminate\Database\Eloquent\Model;

class CustomerBooking extends Model
{
    protected $guarded = [];
    protected $table = 'customer_bookings';

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
