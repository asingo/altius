<?php

namespace App\Filament\Resources\Career\CareerCategoryResource\Pages;

use App\Filament\Resources\Career\CareerCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCareerCategory extends EditRecord
{
    protected static string $resource = CareerCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
