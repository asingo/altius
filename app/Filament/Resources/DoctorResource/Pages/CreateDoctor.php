<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use App\Models\DoctorHasLocation;
use App\Models\LocationHasFacilities;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDoctor extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = DoctorResource::class;
    protected ?array $schedule;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->schedule = $data['scheduleRepeater'];
        unset($data['scheduleRepeater']);
        unset($data['location']);
        return $data;
    }

    protected function afterCreate()
    {
        foreach ($this->schedule as $schedule) {
            DoctorHasLocation::create([
                'doctor_id' => $this->record->id,
                'location_id' => $schedule['locationSchedule'],
                'schedule' => $schedule['days'],
            ]);
        }
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.admin.resources.doctors.index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
