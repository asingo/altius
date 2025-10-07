<?php

namespace App\Filament\Resources\SpecialityResource\Pages;

use App\Filament\Resources\SpecialityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpeciality extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = SpecialityResource::class;
    public function getHeaderActions():array
    {
        return [
            Actions\LocaleSwitcher::make()
        ];
    }
}
