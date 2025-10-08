<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Location extends Model
{
    use HasTranslations;

    public array $translatable = [
        'title',
        'slug',
        'heading',
        'about_title',
        'about_description',
        'image',
        'address',
        'general_number',
        'customer_care',
        'link_maps',
        'link_embedded',
        'cover_image'
    ];

    protected $casts = [
        'about_speciality' => 'array',
    ];

    public function hasSpeciality(): HasMany
    {
        return $this->hasMany(LocationHasSpeciality::class);
    }

    public function hasCoe(): HasMany
    {
        return $this->hasMany(LocationHasCoe::class);
    }

    public function service(): HasMany{
        return $this->hasMany(Service::class);
    }
}
