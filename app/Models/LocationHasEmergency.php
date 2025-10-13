<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocationHasEmergency extends Model
{
    public function location():BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function emergency():BelongsTo
    {
        return $this->belongsTo(Emergency::class, 'emergency_id');
    }
}
