<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MenuFooter extends Model
{
    use HasTranslations;

    public $translatable = ['title'];

    public function pages()
    {
        return $this->belongsTo(Pages::class, 'page_id');
    }
}
