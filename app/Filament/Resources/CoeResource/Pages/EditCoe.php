<?php

namespace App\Filament\Resources\CoeResource\Pages;

use App\Filament\Resources\CoeResource;
use App\Models\LocationHasCoe;
use App\Models\LocationHasSpeciality;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCoe extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = CoeResource::class;

    protected static ?string $title = 'Ubah COE';
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }

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
        LocationHasCoe::where('speciality_id', $this->record->id)->delete();
        foreach ($this->location as $location) {
            LocationHasCoe::create([
                'location_id' => $location,
                'coe_id' => $this->record->id,
            ]);
        }
    }
    public function getBreadcrumbs(): array
    {
        return [
            route('filament.admin.resources.coes.index') => 'COE',
            '' => __('Edit')
        ];
    }
}
