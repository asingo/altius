<?php

namespace App\Models\Offers;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class OffersCategory extends Model
{
    use HasTranslations;
    protected ?array $translatable = ['title'];
}
