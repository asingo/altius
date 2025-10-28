<?php

namespace App\Filament\Resources\MenuHeaderResource\Pages;

use App\Filament\Resources\MenuHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMenuHeaders extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = MenuHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
