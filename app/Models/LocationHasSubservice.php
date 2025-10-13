<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocationHasSubservice extends Model
{
    public function location() : BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function subservice(): BelongsTo
    {
        return $this->belongsTo(Subservice::class, 'subservice_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
