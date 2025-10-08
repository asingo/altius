<?php

namespace App\Filament\Resources\CoeResource\Pages;

use App\Filament\Resources\CoeResource;
use App\Models\LocationHasCoe;
use App\Models\LocationHasSpeciality;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCoe extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected ?array $location;

    protected static string $resource = CoeResource::class;

    protected static ?string $title = 'Center of Excellence';

    protected function getRedirectUrl(): string
    {
        return route('filament.admin.resources.coes.index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            route('filament.admin.resources.coes.index') => 'COE',
            '' => __('Buat')
        ];
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
            LocationHasCoe::create([
                'coe_id' => $this->record->id,
                'location_id' => $location,
            ]);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
