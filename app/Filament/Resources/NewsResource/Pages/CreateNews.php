<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = NewsResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.admin.resources.news.index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
