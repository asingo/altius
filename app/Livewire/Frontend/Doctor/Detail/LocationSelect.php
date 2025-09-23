<?php

namespace App\Livewire\Frontend\Doctor\Detail;

use Livewire\Component;

class LocationSelect extends Component
{
    public $data;

    public $location;

    public $schedule;

    public function mount($data): void
    {
        $this->data = $data;
        $this->location = $this->location ?? $data[0]['name'];
        $this->schedule = $this->schedule ?? $data[0]['schedule'];
    }

    public function locationChanged($value)
    {
        $this->schedule = collect($this->data)->filter(function ($item) use ($value) {
            return $item['name'] === $value;
        })->first()['schedule'];
}

    public function render()
    {
        return view('livewire.doctor.detail.location-select');
    }
}
