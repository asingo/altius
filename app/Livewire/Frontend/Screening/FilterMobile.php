<?php

namespace App\Livewire\Frontend\Screening;

use App\Models\HealthScreening\CategoryAge;
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
    public $age;
    public $gender;

    public function form(Form $form)
    {
        return $form->schema([
            Select::make('location')->label(__('Location'))
                ->options(fn () => Location::all()->pluck('title', 'id')->toArray())
                ->native(false)
                ->live()
                ->afterStateUpdated(fn ($state) => $this->dispatch('handleLocationFilter', $state)),
            Select::make('age')->label(__('Age'))
                ->options(fn () => CategoryAge::get()->mapWithKeys(fn ($item) => [$item->id => $item->title . ' ('. $item->age . ')'])->toArray())
                ->live()
                ->native(false)
                ->afterStateUpdated(fn ($state) => $this->dispatch('handleAgeFilter', $state)),
            Select::make('gender')->label(__('Gender'))
                ->options([
                    'all' => __('all'),
                    'Male' => __('Male'),
                    'Female' => __('Female'),
                ])
                ->live()
                ->native(false)
                ->afterStateUpdated(fn ($state) => $this->dispatch('handleGenderFilter', $state))
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.screening.filter-mobile');
    }
}
