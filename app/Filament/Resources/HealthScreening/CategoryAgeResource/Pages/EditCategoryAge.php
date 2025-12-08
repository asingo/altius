<?php

namespace App\Filament\Resources\HealthScreening\CategoryAgeResource\Pages;

use App\Filament\Resources\HealthScreening\CategoryAgeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryAge extends EditRecord
{
    protected static string $resource = CategoryAgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
