<?php

namespace App\Model\Admin\Operation;

use App\Model\Admin\Configuration\Venue;
use Illuminate\Database\Eloquent\Model;

class BlockedBookingDate extends Model
{
    protected $guarded = [];
    protected $table = 'blocked_booking_dates';

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
