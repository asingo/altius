<?php

namespace App\Livewire\Frontend\Home;

use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class FilterDoctor extends Component implements HasForms
{
    use InteractsWithForms;

    public $doctor_id;

    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('doctor_id')->label('Doctor Name')->options([
                1 => 'Dr. ',
            ])->native(false)->searchable()->preload(),
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.home.filter-doctor');
    }
}
