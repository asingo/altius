<?php

namespace App\Livewire\Doctor;

use Filament\Forms\Components\Radio;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class LocationDoctor extends Component implements HasForms
{
    use InteractsWithForms;

    public function form(Form $form): Form
    {
       return $form->schema([
            Radio::make('location')->options([
                'Altius Hospitals Harapan Indah' => 'Altius Hospitals Harapan Indah',
                'Altius Hospitals Puri Indah' => 'Altius Hospitals Puri Indah',
            ])->label('')
        ]);
    }

    public function render()
    {
        return view('livewire.doctor.location-doctor');
    }
}
