<?php

namespace App\Filament\Resources\Career\CareerCategoryResource\Pages;

use App\Filament\Resources\Career\CareerCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCareerCategories extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = CareerCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make()
            ->modalWidth('lg'),
        ];
    }
}
