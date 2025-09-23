<?php

namespace App\Livewire\Frontend\Career;

use Livewire\Component;

class TypeCareer extends Component
{
    public $data = [
        'Medical',
        'Non Medical'
    ];

    public $type;

    public function typeChanged(){
        $this->dispatch('handleTypeFilter', $this->type);
    }

    public function render()
    {
        return view('livewire.career.type-career');
    }
}
