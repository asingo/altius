<?php

namespace App\Livewire\Frontend\Home;

use App\Models\Doctor;
use App\Models\Location;
use App\Models\Speciality;
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
            Select::make('doctor_id')->label(__('doctor.name'))->placeholder(__('find.doctor.name'))->options(
                fn() => Doctor::pluck('name', 'id')->toArray()
            )->prefixIcon('heroicon-o-magnifying-glass')->preload(5)->native(false)->searchable(),
            Select::make('hospital_id')->label(__('hospital'))->placeholder(__('select.hospital'))->options(
                fn() => Location::pluck('title', 'id')->toArray()
            )->native(false)->searchable()->preload()->prefixIcon('heroicon-o-building-office-2'),
            Select::make('speciality_id')->label(__('speciality'))->placeholder(__('select.speciality'))->options(
                fn() => Speciality::pluck('title', 'id')->toArray()
            )->native(false)->searchable()->prefixIcon('heroicon-o-magnifying-glass')->preload(),
            Select::make('day')->label(__('preferred.day'))->options([
                'monday' => 'Monday',
                'tuesday' => 'Tuesday',
                'wednesday' => 'Wednesday',
                'thursday' => 'Thursday',
                'friday' => 'Friday',
                'saturday' => 'Saturday',
                'sunday' => 'Sunday',
            ])->native(false)->prefixIcon('heroicon-o-calendar'),
//            DatePicker::make('date')->label('Date')->placeholder('Pick a Date')->format('Y-m-d')
//                ->native(false)
//                ->prefixIcon('heroicon-o-calendar'),
        ])->statePath('data')->columns(4);
    }

    public function findDoctor()
    {
        $data = $this->form->getState();
        return redirect()->to(localized_route('doctor', $data).'#listDoctor');
    }

    public function resetForm()
    {
        $this->form->fill([]); // or to defaults, or from record
    }

    public function render()
    {
        return view('livewire.frontend.home.filter-doctor');
    }
}
