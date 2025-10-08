<?php

namespace App\Filament\Resources\SpecialityResource\Pages;

use App\Filament\Resources\SpecialityResource;
use App\Models\LocationHasSpeciality;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpeciality extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = SpecialityResource::class;
    protected ?array $location;

    public function getRedirectUrl(): string
    {
        return route('filament.admin.resources.specialities.index');
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
            LocationHasSpeciality::create([
                'speciality_id' => $this->record->id,
                'location_id' => $location,
            ]);
        }
    }

    public function getHeaderActions():array
    {
        return [
            Actions\LocaleSwitcher::make()
        ];
    }
}
