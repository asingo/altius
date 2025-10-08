<?php

namespace App\Filament\Resources\SpecialityResource\Pages;

use App\Filament\Resources\SpecialityResource;
use App\Models\LocationHasSpeciality;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpeciality extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = SpecialityResource::class;
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
        LocationHasSpeciality::where('speciality_id', $this->record->id)->delete();
        foreach ($this->location as $location) {
            LocationHasSpeciality::create([
                'location_id' => $location,
                'speciality_id' => $this->record->id,
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
