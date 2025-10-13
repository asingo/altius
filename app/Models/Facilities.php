<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Facilities extends Model
{
    use HasTranslations;
    public array $translatable = [
        'title',
        'slug',
        'content',
    ];

    protected $casts = [
        'location' => 'array'
    ];

    public function hasLocation(): HasMany
    {
        return $this->hasMany(LocationHasFacilities::class, 'facility_id');
    }
}
