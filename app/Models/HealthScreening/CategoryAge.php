<?php

namespace App\Models\HealthScreening;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CategoryAge extends Model
{
    use HasTranslations;
    protected ?array $translatable = ['title', 'age'];
}
