<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Subservice extends Model
{
    use HasTranslations;

    protected array $translatable = [
        'slug',
        'title',
        'content'
    ];

    public function hasLocation(): HasMany
    {
        return $this->hasMany(LocationHasSubservice::class);
    }

    public function service(): BelongsTo{
        return $this->belongsTo(Service::class);
    }
}
