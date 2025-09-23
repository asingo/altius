<?php

namespace App\Livewire\Doctor;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class SpecialityDoctor extends Component implements HasForms
{
    use InteractsWithForms;

    public $filterSpeciality;

    public $schema = [
        'All',
        'Orthopedic',
        'Surgery',
        'Obstetrics & Gynecology',
        'ENT (Ear, Nose, and Throat)',
        'Urology',
        'Heart',
        'Thoracic and Cardiovascular Surgery'
    ];

    public $speciality;

    public function specialityChanged()
    {
        $this->dispatch('handleSpecialityFilter', $this->speciality);
    }

    public function form(Form $form)
    {
        return $form->schema([
            TextInput::make('filterSpeciality')
                ->prefixIcon('heroicon-o-magnifying-glass')
                ->label('')
                ->placeholder('Type a speciality')
                ->live()
        ]);
    }

    public function render()
    {
        $data = collect($this->schema)->filter(function($data){
            return $this->filterSpeciality === ''
                || str_contains(strtolower($data), strtolower($this->filterSpeciality));
        })->values();
        return view('livewire.doctor.speciality-doctor', compact('data'));
    }
}
