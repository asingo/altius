<?php

namespace App\Filament\Resources\LocationResource\Pages;

use App\Filament\Resources\LocationResource;
use App\Models\Location;
use App\Models\LocationHasSpeciality;
use App\Models\Speciality;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLocation extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = LocationResource::class;
    protected ?array $speciality;

    public function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.admin.resources.locations.index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['is_published'] = true;
        $data['index'] = Location::all()->count() + 1;
        $this->speciality = $data['about_speciality'] ?? [];
        unset($data['about_speciality']);
        return $data;
    }

    protected function afterCreate()
    {
        foreach ($this->speciality as $speciality) {
            LocationHasSpeciality::create([
                'location_id' => $this->record->id,
                'speciality_id' => $speciality,
            ]);
        }
    }
}
