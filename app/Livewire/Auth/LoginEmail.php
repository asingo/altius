<?php

namespace App\Livewire\Auth;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class LoginEmail extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

    public ?array $data = [];

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('email')->email()->required(),
            TextInput::make('password')->password()->revealable()->required(),
        ])->statePath('data');
    }

    public function login()
    {
        $locale = app()->getLocale();
        $credentials = [
            'email' => $this->data['email'],
            'password' => $this->data['password'],
        ];

        if (auth()->attempt($credentials)) {
            session()->regenerate();
            return redirect()->intended(route('profile_'. $locale));
        }
        Session()->flash('errors', 'Email or password is incorrect.');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.auth.login-email')->layout('auth.layout');
    }
}
