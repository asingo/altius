<?php

namespace App\Livewire\Frontend\Screening;

use App\Models\HealthScreening\CategoryAge;
use Livewire\Component;

class AgeScreening extends Component
{
    public $data;
    public $age = 'all';

    public function ageChanged()
    {
        $this->dispatch('handleAgeFilter', $this->age);
    }

    public function mount()
    {
        $schema = CategoryAge::get()->map(function ($categoryAge) {
            return [
                'id' => $categoryAge->id,
                'name' => $categoryAge->title,
                'age' => $categoryAge->age,
            ];
        });
        $all = [
            'id' => 'all',
            'name' => 'All',
            'age' => ''
        ];
        $this->data = collect([$all])->merge($schema);
    }

    public function render()
    {
        return view('livewire.frontend.screening.age-screening');
    }
}
