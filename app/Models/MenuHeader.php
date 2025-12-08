<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Translatable\HasTranslations;

class MenuHeader extends Model
{
    use HasTranslations;

    public $translatable = ['title'];

    protected static function booted()
    {
        static::addGlobalScope('defaultSort', function (Builder $builder) {
            $builder->orderBy('index', 'asc');
        });
    }

    public function pages()
    {
        return $this->belongsTo(Pages::class, 'page_id');
    }
}
