<?php

namespace App\Filament\Resources\MenuHeaderResource\Pages;

use App\Filament\Resources\MenuHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMenuHeader extends EditRecord
{
    protected static string $resource = MenuHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
