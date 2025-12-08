<?php

namespace App\Filament\Resources\Career\DepartmentResource\Pages;

use App\Filament\Resources\Career\DepartmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDepartments extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = DepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make()
            ->modalWidth('lg'),
        ];
    }
}
