<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class CreateAccount extends Component
{
    public int $step = 1;

    public function nextStep()
    {
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function render()
    {
        return view('livewire.auth.create-account')->layout('auth.layout');
    }
}
