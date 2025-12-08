<?php

namespace App\Filament\Resources\PatientUserResource\Pages;

use App\Filament\Resources\PatientUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPatientUsers extends ListRecords
{
    protected static string $resource = PatientUserResource::class;

    protected static ?string $title = 'Patient Users';

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
}
