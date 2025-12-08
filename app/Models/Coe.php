<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Coe extends Model
{
    use HasTranslations;
    public array $translatable = [
        'title',
        'slug',
        'content',
        'image'
    ];
    //
    public function hasLocation(): HasMany
    {
        return $this->hasMany(LocationHasCoe::class);
    }
}
