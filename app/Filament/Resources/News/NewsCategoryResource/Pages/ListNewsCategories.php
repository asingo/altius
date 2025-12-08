<?php

namespace App\Filament\Resources\News\NewsCategoryResource\Pages;

use App\Filament\Resources\News\NewsCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsCategories extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = NewsCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make()->modalWidth('lg'),
        ];
    }
}
