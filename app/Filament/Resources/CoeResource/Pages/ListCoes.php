<?php

namespace App\Filament\Resources\CoeResource\Pages;

use App\Filament\Resources\CoeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoes extends ListRecords
{
    protected static string $resource = CoeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
