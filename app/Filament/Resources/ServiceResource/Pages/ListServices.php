<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Class\RoleManager;
use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServices extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make()->visible(fn (): bool =>
            RoleManager::getAcl('services', auth()->user()->role, 'create')
            ),
        ];
    }
}
