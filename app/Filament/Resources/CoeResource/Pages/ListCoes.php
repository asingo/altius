<?php

namespace App\Filament\Resources\CoeResource\Pages;

use App\Filament\Resources\CoeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoes extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = CoeResource::class;

    protected static ?string $title = 'Center of Excellence';

    public function getBreadcrumbs(): array
    {
        return [
            '#' => 'COE',
            '' => __('Daftar')
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make()->label(__('Buat') . ' COE'),
        ];
    }
}
