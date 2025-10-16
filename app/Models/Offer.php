<?php

namespace App\Models;

use App\Models\Offers\OffersCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Offer extends Model
{
    use HasTranslations;
    public array $translatable = ['title','slug', 'content'];

    public function category()
    {
        return $this->belongsTo(OffersCategory::class, 'offers_category_id');
    }

    public function hasLocation()
    {
        return $this->hasMany(OfferHasLocation::class, 'offer_id');
    }
}
