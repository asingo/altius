<?php

namespace App\Filament\Resources\EmergencyResource\Pages;

use App\Filament\Resources\EmergencyResource;
use App\Models\LocationHasEmergency;
use App\Models\LocationHasFacilities;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmergency extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = EmergencyResource::class;

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
        LocationHasEmergency::where('emergency_id', $this->record->id)->delete();
        foreach ($this->location as $location) {
            LocationHasEmergency::create([
                'location_id' => $location,
                'emergency_id' => $this->record->id,
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
