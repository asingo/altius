<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateArticle extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = ArticleResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.admin.resources.articles.index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
