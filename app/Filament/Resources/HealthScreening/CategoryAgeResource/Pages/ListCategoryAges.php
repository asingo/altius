<?php

namespace App\Filament\Resources\HealthScreening\CategoryAgeResource\Pages;

use App\Filament\Resources\HealthScreening\CategoryAgeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryAges extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = CategoryAgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make()
            ->modalWidth('lg'),
        ];
    }
}
