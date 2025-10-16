<?php

namespace App\Models\Career;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CareerCategory extends Model
{
    use HasTranslations;
    protected ?array $translatable = ['title'];
}
