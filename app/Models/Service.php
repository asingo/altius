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

    public function subservice(){
        return $this->belongsToMany(Subservice::class, 'location_has_subservices')
            ->withPivot('location_id')
            ->distinct();
    }

    public function subservices()
    {
        return $this->hasMany(Subservice::class);
    }

//    public function location()
//    {
//        return $this->belongsToMany(Location::class, 'location_has_subservices')
//            ->withPivot('subservice_id');
//    }
}
