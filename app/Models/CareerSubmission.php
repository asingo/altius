<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CareerSubmission extends Model
{
    public function provinceData(): BelongsTo
    {
        return $this->belongsTo(Wilayah::class, 'province', 'kode');
    }

    public function cityData(): BelongsTo
    {
        return $this->belongsTo(Wilayah::class, 'city', 'kode');
    }
}
