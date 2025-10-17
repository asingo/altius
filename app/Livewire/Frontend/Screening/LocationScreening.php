<?php

namespace App\Livewire\Frontend\Screening;

use App\Models\Location;
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
        $location = Location::get()->pluck('title', 'id')->toArray();
        $all = ['all' => 'All'];
        $this->data = $all + $location;
    }

    public function render()
    {
        return view('livewire.frontend.screening.location-screening');
    }
}
