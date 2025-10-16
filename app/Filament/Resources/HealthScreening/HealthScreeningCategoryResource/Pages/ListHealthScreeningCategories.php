<?php

namespace App\Filament\Resources\HealthScreening\HealthScreeningCategoryResource\Pages;

use App\Filament\Resources\HealthScreening\HealthScreeningCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHealthScreeningCategories extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = HealthScreeningCategoryResource::class;
protected static ?string $title = 'Category';
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make()
                ->modalWidth('lg'),
        ];
    }
}
