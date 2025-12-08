<?php

namespace App\Models;

use App\Models\HealthScreening\CategoryAge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HealthScreeningHasAge extends Model
{
    public function age(): BelongsTo
    {
        return $this->belongsTo(CategoryAge::class, 'age_id');
    }
}
