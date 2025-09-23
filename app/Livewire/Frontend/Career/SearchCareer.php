<?php

namespace App\Livewire\Frontend\Career;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class SearchCareer extends Component implements HasForms
{
    use InteractsWithForms;

    public $search;

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('search')->prefixIcon('heroicon-o-magnifying-glass')
                ->label('')->placeholder('Search Here......')
            ->live()
            ->afterStateUpdated(fn ($state, $livewire) => $livewire->dispatch('handleSearch', $state))
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.career.search-career');
    }
}
