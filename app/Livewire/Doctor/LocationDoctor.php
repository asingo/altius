<?php

namespace App\Livewire\Doctor;

use Filament\Forms\Components\Radio;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class LocationDoctor extends Component
{
    public $data;
    public $location;

    public function locationChanged()
    {
        $this->dispatch('handleLocationFilter', $this->location);
    }

    public function mount()
    {
        $this->data = [
            'Altius Hospitals Harapan Indah',
            'Altius Hospitals Puri Indah'
        ];
    }

    public function render()
    {
        return view('livewire.doctor.location-doctor');
    }
}
