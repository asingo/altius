<?php

namespace App\Livewire\Frontend\Doctor;

use App\Models\Doctor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Http\Request;
use Livewire\Component;


class SearchDoctor extends Component implements HasForms
{
    use InteractsWithForms;

    public $search;

    public function mount(Request $request)
    {
        if ($request->doctor_id) {
            $this->search = Doctor::find($request->doctor_id)->name;
        }
    }

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
