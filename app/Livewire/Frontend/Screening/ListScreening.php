<?php

namespace App\Livewire\Frontend\Screening;

use Livewire\Component;

class ListScreening extends Component
{
    public $data;

    public function mount($data): void
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.frontend.screening.list-screening');
    }
}
