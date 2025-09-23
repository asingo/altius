<?php

namespace App\Livewire\Frontend\Doctor;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class SearchDoctor extends Component implements HasForms
{
    use InteractsWithForms;

    public $search;

    public function form(Form $form)
    {
        return $form->schema([
            TextInput::make('search')->prefixIcon('heroicon-o-magnifying-glass')
                ->label('')
                ->live()
                ->afterStateUpdated(fn ($state, $livewire) => $livewire->dispatch('handleSearch', ['query' => $state]))
                ->placeholder('Type the doctor\'s name or Speciality'),
        ]);
    }

    public function render()
    {
        return view('livewire.doctor.search-doctor');
    }
}
