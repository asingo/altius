<?php

namespace App\Filament\Resources\PagesResource\Pages;

use App\Filament\Resources\PagesResource;
use Filament\Actions;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Pages\CreateRecord;

class CreatePages extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = PagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make()->label('Language')
        ];
    }

//    protected function mutateFormDataBeforeCreate(array $data): array
//    {
////        dd($data);
//    }
}
