<?php

namespace App\Livewire\Frontend\Doctor;

use App\Models\Location;
use App\Models\Speciality;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class FilterMobile extends Component implements HasForms
{
    use InteractsWithForms;

    public $location;
    public $speciality;
    public $day;

//    public function mount(): void
//    {
//        $this->form->fill();
//    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('location')->label(__('Location'))
                ->options(fn () => Location::all()->pluck('title', 'id')->toArray())
                ->native(false)
                ->live()
                ->afterStateUpdated(fn ($state) => $this->dispatch('handleLocationFilter', $state)),
            Select::make('speciality')->label(__('Speciality'))
                ->options(fn () => Speciality::all()->pluck('title', 'id')->toArray())
                ->live()
                ->native(false)
                ->afterStateUpdated(fn ($state) => $this->dispatch('handleSpecialityFilter', $state)),
            Select::make('day')->label(__('Preferred Day'))
                ->options([
                    'all' => __('all'),
                    'monday' => __('monday'),
                    'tuesday' => __('tuesday'),
                    'wednesday' => __('wednesday'),
                    'thursday' => __('thursday'),
                    'friday' => __('friday'),
                    'saturday' => __('saturday'),
                    'sunday' => __('sunday'),
                ])
                ->live()
                ->native(false)
                ->afterStateUpdated(fn ($state) => $this->dispatch('handleDateFilter', $state))
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.doctor.filter-mobile');
    }
}
