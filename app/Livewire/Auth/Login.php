<?php

namespace App\Livewire\Auth;

use Auth;
use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        $locale = app()->getLocale();
        if(Auth::check()){
           $this->redirect(route('profile_'. $locale));
        }
        return view('livewire.auth.login')->layout('auth.layout');
    }
}
