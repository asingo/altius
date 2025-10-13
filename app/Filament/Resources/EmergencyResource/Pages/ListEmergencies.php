<?php

namespace App\Filament\Resources\EmergencyResource\Pages;

use App\Filament\Resources\EmergencyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmergencies extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = EmergencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
