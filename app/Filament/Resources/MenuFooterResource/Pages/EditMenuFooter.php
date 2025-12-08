<?php

namespace App\Filament\Resources\MenuFooterResource\Pages;

use App\Filament\Resources\MenuFooterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMenuFooter extends EditRecord
{
    protected static string $resource = MenuFooterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
