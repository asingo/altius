<?php

namespace App\Filament\Resources\PagesResource\Pages;

use App\Filament\Resources\PagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPages extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = PagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make()->label('Language'),
            Actions\DeleteAction::make(),
        ];
    }
}
