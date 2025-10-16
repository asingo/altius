<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimony extends Model
{
    use HasTranslations;
    public array $translatable = ['name', 'content', 'title'];
}
