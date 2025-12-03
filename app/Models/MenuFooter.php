<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MenuFooter extends Model
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
