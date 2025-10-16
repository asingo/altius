<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthScreeningHasLocation extends Model
{
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function healthScreening()
    {
        return $this->belongsTo(HealthScreening::class);
    }
}
