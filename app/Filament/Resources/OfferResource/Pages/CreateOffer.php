<?php

namespace App\Filament\Resources\OfferResource\Pages;

use App\Filament\Resources\OfferResource;
use App\Models\LocationHasSpeciality;
use App\Models\OfferHasLocation;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOffer extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = OfferResource::class;
    protected ?array $location;

    public function getRedirectUrl(): string
    {
        return route('filament.admin.resources.offers.index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->location = $data['location'] ?? [];
        unset($data['location']);
        return $data;
    }

    protected function afterCreate()
    {
        foreach ($this->location as $location) {
            OfferHasLocation::create([
                'offer_id' => $this->record->id,
                'location_id' => $location,
            ]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make()
        ];
    }
}
