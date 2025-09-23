<?php

namespace App\Livewire\Frontend\Doctor;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class DateDoctor extends Component implements HasForms
{
    use InteractsWithForms;

    public $filterDate;

    public $schema = [
        'All',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
    ];

    public $date;

    public function dateChanged(){
        $this->dispatch('handleDateFilter', $this->date);
    }

    public function form(Form $form)
    {
        return $form->schema([
            TextInput::make('filterDate')
                ->prefixIcon('heroicon-o-magnifying-glass')
                ->label('')
                ->placeholder('Type Preffered Date')
                ->live()
        ]);
    }

    public function render()
    {
        $data = collect($this->schema)->filter(function($data){
            return $this->filterDate === ''
                || str_contains(strtolower($data), strtolower($this->filterDate));
        })->values();
        return view('livewire.doctor.date-doctor', compact('data'));
    }
}
