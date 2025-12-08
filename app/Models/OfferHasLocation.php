<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfferHasLocation extends Model
{
    public function location():BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
