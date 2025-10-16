<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use App\Models\DoctorHasLocation;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDoctor extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = DoctorResource::class;
    protected array $schedule;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $getLocation = $this->record->hasLocation()->get();
        $data['location'] = $getLocation->map(fn ($location) => $location->location_id)->toArray();
        $data['scheduleRepeater'] = $getLocation->mapWithKeys(fn ($location, $key) => [
            $key => ['locationSchedule' => $location->location_id,
                'days' => $location->schedule,]
        ])->toArray();
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {

        $this->schedule = $this->form->getState()['scheduleRepeater'] ?? [];
        unset($data['scheduleRepeater']);
        unset($data['location']);
//        dd($this->schedule);
        return $data;
    }

    protected function afterSave()
    {
        DoctorHasLocation::where('doctor_id', $this->record->id)->delete();
        foreach ($this->schedule as $schedule) {
            DoctorHasLocation::create([
                'doctor_id' => $this->record->id,
                'location_id' => $schedule['locationSchedule'],
                'schedule' => $schedule['days'],
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
