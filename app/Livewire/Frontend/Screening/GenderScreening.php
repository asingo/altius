<?php

namespace App\Livewire\Frontend\Screening;

use Livewire\Component;

class GenderScreening extends Component
{
    public $data;
    public $gender;

    public function genderChanged()
    {
        $this->dispatch('handleGenderFilter', $this->gender);
    }

    public function mount()
    {
        $this->data = [
            'Male',
            'Female'
        ];
    }

    public function render()
    {
        return view('livewire.frontend.screening.gender-screening');
    }
}
