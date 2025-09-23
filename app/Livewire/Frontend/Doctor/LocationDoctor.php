<?php

namespace App\Livewire\Frontend\Doctor;

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
