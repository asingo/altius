<?php

namespace App\Livewire\Frontend\Screening;

use Livewire\Component;

class LocationScreening extends Component
{
    public $data;
    public $location = 'all';

    public function locationChanged()
    {
        $this->dispatch('handleLocationFilter', $this->location);
    }

    public function mount()
    {
        $this->data = [
            'all',
            'Altius Hospitals Harapan Indah',
            'Altius Hospitals Puri Indah'
        ];
    }

    public function render()
    {
        return view('livewire.frontend.screening.location-screening');
    }
}
