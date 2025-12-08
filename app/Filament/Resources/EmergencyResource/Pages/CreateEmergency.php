<?php

namespace App\Filament\Resources\EmergencyResource\Pages;

use App\Filament\Resources\EmergencyResource;
use App\Models\LocationHasEmergency;
use App\Models\LocationHasFacilities;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmergency extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = EmergencyResource::class;
    protected ?array $location;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getRedirectUrl(): string
    {
        return route('filament.admin.resources.emergencies.index');
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
            LocationHasEmergency::create([
                'emergency_id' => $this->record->id,
                'location_id' => $location,
            ]);
        }
    }
}
