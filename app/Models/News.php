<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasTranslations;
    public array $translatable = ['title', 'slug', 'content'];
    public function category(): BelongsTo{
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }
}
