<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocationHasSpeciality extends Model
{
    public function location():BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function speciality():BelongsTo
    {
        return $this->belongsTo(Speciality::class);
    }
}
