<?php

namespace App\Filament\Resources\PatientUserResource\Pages;

use App\Filament\Resources\PatientUserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePatientUser extends CreateRecord
{
    protected static string $resource = PatientUserResource::class;
}
