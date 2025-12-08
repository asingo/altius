<?php

namespace App\Filament\Resources\FacilitiesResource\Pages;

use App\Filament\Resources\FacilitiesResource;
use App\Models\LocationHasFacilities;
use App\Models\LocationHasSpeciality;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFacilities extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = FacilitiesResource::class;
    protected ?array $location;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }

    public function getRedirectUrl(): string
    {
        return route('filament.admin.resources.facilities.index');
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
            LocationHasFacilities::create([
                'facility_id' => $this->record->id,
                'location_id' => $location,
            ]);
        }
    }
}
