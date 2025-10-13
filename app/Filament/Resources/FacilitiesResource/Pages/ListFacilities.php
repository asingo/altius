<?php

namespace App\Filament\Resources\FacilitiesResource\Pages;

use App\Filament\Resources\FacilitiesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\LocaleSwitcher;

class ListFacilities extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = FacilitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
