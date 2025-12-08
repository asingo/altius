<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Class\RoleManager;
use App\Filament\Resources\DoctorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDoctors extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = DoctorResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make()->visible(fn (): bool =>
                RoleManager::getAcl('doctors', auth()->user()->role, 'create')
            ),
        ];
    }
}
