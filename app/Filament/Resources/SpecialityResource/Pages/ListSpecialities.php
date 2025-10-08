<?php

namespace App\Filament\Resources\SpecialityResource\Pages;

use App\Filament\Resources\SpecialityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;


class ListSpecialities extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = SpecialityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
