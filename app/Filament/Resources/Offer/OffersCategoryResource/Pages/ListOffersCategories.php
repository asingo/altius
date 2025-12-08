<?php

namespace App\Filament\Resources\Offer\OffersCategoryResource\Pages;

use App\Filament\Resources\Offer\OffersCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOffersCategories extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = OffersCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make()->modalWidth('lg'),
        ];
    }
}
