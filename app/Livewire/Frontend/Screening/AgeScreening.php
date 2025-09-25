<?php

namespace App\Livewire\Frontend\Screening;

use Livewire\Component;

class AgeScreening extends Component
{
    public $data;
    public $age;

    public function ageChanged()
    {
        $this->dispatch('handleAgeFilter', $this->age);
    }

    public function mount()
    {
        $this->data = [
            [
                'name' => 'Children',
                'meta' => '<10 yo'
            ],
            [
                'name' => 'Teenager',
                'meta' => '10-19 yo'
            ],
            [
                'name' => 'Young Adult',
                'meta' => '20-40 yo'
            ],
            [
                'name' => 'Adult',
                'meta' => '40-64 yo'
            ],
            [
                'name' => 'Senior Adult',
                'meta' => '>65 yo'
            ]

        ];
    }

    public function render()
    {
        return view('livewire.frontend.screening.age-screening');
    }
}
