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
        $this->location = $this->location ?? $data->first()->location_id;
        $this->schedule = $this->schedule ?? $data->first()->schedule;
    }

    public function locationChanged($value)
    {
        $this->schedule = $this->data->where('location_id', $value)
            ->map(function ($item) {
                $item['location_name'] = $item->location->title;
                return $item;
            })->first()->schedule;
    }

    public function render()
    {
        return view('livewire.doctor.detail.location-select');
    }
}
