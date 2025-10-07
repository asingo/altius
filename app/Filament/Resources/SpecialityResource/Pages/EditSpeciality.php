<?php

namespace App\Filament\Resources\SpecialityResource\Pages;

use App\Filament\Resources\SpecialityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpeciality extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = SpecialityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
