<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;
use Sushi\Sushi;

class Doctor extends Model
{
    use HasTranslations;
    public array $translatable = ['biography', 'expertise', 'education', 'publication'];

    public function speciality(): BelongsTo
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }

    public function hasLocation(): HasMany{
        return $this->hasMany(DoctorHasLocation::class);
    }
}
