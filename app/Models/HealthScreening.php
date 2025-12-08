<?php

namespace App\Models;

use App\Models\HealthScreening\HealthScreeningCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class HealthScreening extends Model
{
    use HasTranslations;

    protected ?array $translatable = ['title', 'slug', 'description'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(HealthScreeningCategory::class, 'health_screening_category_id');
    }

    public function hasLocation(): HasMany
    {
        return $this->hasMany(HealthScreeningHasLocation::class, 'health_screening_id');
    }

    public function hasAge(): HasMany
    {
        return $this->hasMany(HealthScreeningHasAge::class, 'health_screening_id');
    }
}
