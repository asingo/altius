<?php

namespace App\Filament\Resources\CareerSubmissionResource\Pages;

use App\Filament\Resources\CareerSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCareerSubmission extends EditRecord
{
    protected static string $resource = CareerSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
