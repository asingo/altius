<?php

namespace App\Models\HealthScreening;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HealthScreeningCategory extends Model
{
    use HasTranslations;
    protected ?array $translatable = ['title'];
}
