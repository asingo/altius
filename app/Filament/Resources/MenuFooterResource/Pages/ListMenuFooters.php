<?php

namespace App\Filament\Resources\MenuFooterResource\Pages;

use App\Filament\Resources\MenuFooterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMenuFooters extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = MenuFooterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
