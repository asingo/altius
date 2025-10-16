<?php

namespace App\Filament\Resources\HealthScreeningResource\Pages;

use App\Filament\Resources\HealthScreeningResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHealthScreenings extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = HealthScreeningResource::class;



    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
