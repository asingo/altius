<?php

namespace App\Filament\Resources\HealthScreeningResource\Pages;

use App\Filament\Resources\HealthScreeningResource;
use App\Models\HealthScreeningHasAge;
use App\Models\HealthScreeningHasLocation;
use App\Models\LocationHasSpeciality;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use function Termwind\parse;

class CreateHealthScreening extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = HealthScreeningResource::class;
    protected ?array $location;
    protected ?array $age;
    public function getRedirectUrl(): string
    {
        return route('filament.admin.resources.health-screenings.index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->location = $data['location'] ?? [];
        $this->age = $data['ages'] ?? [];
        unset($data['location']);
        unset($data['ages']);
        return $data;
    }

    protected function afterCreate()
    {
        foreach ($this->location as $location) {
            HealthScreeningHasLocation::create([
                'health_screening_id' => $this->record->id,
                'location_id' => $location,
            ]);
        }
        foreach($this->age as $age){
            HealthScreeningHasAge::create([
                'health_screening_id' => $this->record->id,
                'age_id'=>$age
            ]);
        }
    }

    public function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
