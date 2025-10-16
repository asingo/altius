<?php

namespace App\Filament\Resources\OfferResource\Pages;

use App\Filament\Resources\OfferResource;
use App\Models\LocationHasSpeciality;
use App\Models\OfferHasLocation;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOffer extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = OfferResource::class;
    protected ?array $location = [];

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['location'] = $this->record->hasLocation()->get()->map(fn ($location) => $location->location_id)->toArray();
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->location = $this->form->getState()['location'] ?? [];
        unset($data['location']);
        return $data;
    }

    protected function afterSave()
    {
        OfferHasLocation::where('offer_id', $this->record->id)->delete();
        foreach ($this->location as $location) {
            OfferHasLocation::create([
                'location_id' => $location,
                'offer_id' => $this->record->id,
            ]);
        }
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
