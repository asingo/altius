<?php

namespace App\Filament\Resources\LocationResource\Pages;

use App\Filament\Resources\LocationResource;
use App\Models\LocationHasSpeciality;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLocation extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = LocationResource::class;
    protected ?array $speciality;

    protected function getHeaderActions(): array
    {
        return [

            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['about_speciality'] = $this->record->hasSpeciality->map(fn ($speciality) => $speciality->speciality_id)->toArray();
       return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->speciality = $data['about_speciality'] ?? [];
        unset($data['about_speciality']);
        return $data;
    }

    protected function afterSave()
    {
        LocationHasSpeciality::where('location_id', $this->record->id)->delete();
        foreach ($this->speciality as $speciality) {
            LocationHasSpeciality::create([
                'location_id' => $this->record->id,
                'speciality_id' => $speciality,
            ]);
        }
    }
}
