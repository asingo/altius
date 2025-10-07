<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Speciality extends Model
{
    use HasTranslations;

    public array $translatable = [
        'title',
    ];
    public function hasLocation(): HasMany
    {
        return $this->hasMany(LocationHasSpeciality::class);
    }
}
