<?php

namespace App\Filament\Resources\HealthScreening\HealthScreeningCategoryResource\Pages;

use App\Filament\Resources\HealthScreening\HealthScreeningCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHealthScreeningCategory extends EditRecord
{
    protected static string $resource = HealthScreeningCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
