<?php

namespace App\Livewire\Frontend\Home;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class FilterDoctor extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('doctor_id')->label('Doctor Name')->placeholder('Find Doctor Name')->options([
                1 => 'Dr. ',
            ])->native(false)->searchable()->prefixIcon('heroicon-o-magnifying-glass')->preload(),
            Select::make('hospital_id')->label('Hospital')->placeholder('Select Hospital')->options([
                1 => 'Rumah Sakit',
            ])->native(false)->searchable()->preload(),
            Select::make('speciality_id')->label('Speciality')->placeholder('Select Speciality')->options([
                1 => 'Urology',
            ])->native(false)->searchable()->prefixIcon('heroicon-o-magnifying-glass')->preload(),
            DatePicker::make('date')->label('Date')->placeholder('Pick a Date')->format('Y-m-d')
                ->native(false)
                ->prefixIcon('heroicon-o-calendar'),
        ])->statePath('data')->columns(4);
    }

    public function render()
    {
        return view('livewire.frontend.home.filter-doctor');
    }
}
