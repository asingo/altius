<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    protected array $translatable = [
      'title',
      'slug'
    ];

    public function subservices():  HasMany{
        return $this->hasMany(Subservice::class);
    }
}
