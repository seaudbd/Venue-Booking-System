<?php

namespace App\Model\Admin\Configuration;

use Illuminate\Database\Eloquent\Model;

class VenueOpeningHour extends Model
{
    protected $guarded = [];
    protected $table = 'venue_opening_hours';

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
