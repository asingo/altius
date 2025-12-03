<?php

namespace App\Livewire\Settings;

use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Contracts\HasTable;
use Livewire\Component;

class User extends Component implements HasForms, HasTable, HasActions
{
    use InteractsWithForms, InteractsWithTable, InteractsWithActions;


    public function render()
    {
        return view('livewire.settings.user');
    }
}
