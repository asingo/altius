<?php

namespace App\Livewire\Frontend\Doctor\Detail;

use App\Models\Location;
use Livewire\Attributes\On;
use Livewire\Component;

class BookingBar extends Component
{
    public $name;
    public $location;
    public $initLocation;
    public $customerCare;

    public function mount($name, $initLocation)
    {
        $this->name = $name;
        $this->initLocation = $initLocation->first();
        $this->location = Location::find($this->initLocation->location_id);
        $this->customerCare = 62 . filter_var(substr($this->location->customer_care, 1), FILTER_SANITIZE_NUMBER_INT);
    }

    #[On('handleLocation')]
    public function handleLocation($location)
    {
        $this->location = $location;
    }

    public function render()
    {
        return view('livewire.frontend.doctor.detail.booking-bar');
    }
}
