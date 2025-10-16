<?php

namespace App\Filament\Resources\HealthScreeningResource\Pages;

use App\Filament\Resources\HealthScreeningResource;
use App\Models\HealthScreeningHasAge;
use App\Models\HealthScreeningHasLocation;
use App\Models\LocationHasSpeciality;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHealthScreening extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = HealthScreeningResource::class;
    protected ?array $location = [];
    protected ?array $age = [];

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['location'] = $this->record->hasLocation()->get()->map(fn ($location) => $location->location_id)->toArray();
        $data['ages'] = $this->record->hasAge()->get()->map(fn ($age) => $age->age_id)->toArray();
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->location = $this->form->getState()['location'] ?? [];
        $this->age = $this->form->getState()['ages'] ?? [];
        unset($data['ages']);
        unset($data['location']);
        return $data;
    }

    protected function afterSave()
    {
        HealthScreeningHasLocation::where('health_screening_id', $this->record->id)->delete();
        foreach ($this->location as $location) {
           HealthScreeningHasLocation::create([
                'location_id' => $location,
                'health_screening_id' => $this->record->id,
            ]);
        }
        HealthScreeningHasAge::where('health_screening_id', $this->record->id)->delete();
        foreach($this->age as $age){
            HealthScreeningHasAge::create([
                'health_screening_id' => $this->record->id,
                'age_id'=>$age
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
