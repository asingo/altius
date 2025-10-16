<?php

namespace App\Filament\Resources\Offer\OffersCategoryResource\Pages;

use App\Filament\Resources\Offer\OffersCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOffersCategory extends EditRecord
{
    protected static string $resource = OffersCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
