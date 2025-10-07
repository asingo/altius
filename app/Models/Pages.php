<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Pages extends Model
{
    use HasTranslations;

    public array $translatable = [
        'title',
        'slug',
        'image',
        'content'
    ];
}
