<?php

namespace App\Filament\Resources\CareerSubmissionResource\Pages;

use App\Filament\Resources\CareerSubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCareerSubmissions extends ListRecords
{
    protected static string $resource = CareerSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}
