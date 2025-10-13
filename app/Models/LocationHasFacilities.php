<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocationHasFacilities extends Model
{
    public function location():BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function facilities(): BelongsTo
    {
        return $this->belongsTo(Facilities::class, 'facility_id');
    }
}
