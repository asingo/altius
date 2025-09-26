<?php

namespace App\Livewire\Frontend\Career;

use Livewire\Component;

class TypeCareer extends Component
{
    public $data = [
        'All',
        'Medical',
        'Non Medical'
    ];

    public $type = 'All';

    public function typeChanged(){
        $this->dispatch('handleTypeFilter', $this->type);
    }

    public function render()
    {
        return view('livewire.career.type-career');
    }
}
