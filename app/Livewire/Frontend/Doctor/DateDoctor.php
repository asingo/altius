<?php

namespace App\Livewire\Frontend\Doctor;

use App\Models\Speciality;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Http\Request;
use Livewire\Component;
use Termwind\Html\InheritStyles;

class DateDoctor extends Component implements HasForms
{
    use InteractsWithForms;

    public $filterDate;

    public $schema;

    public $date = 'all';

    public function mount(Request $request): void
    {
       $this->schema = [
            'all' => __('all'),
            'monday' => __('monday'),
            'tuesday' => __('tuesday'),
            'wednesday' => __('wednesday'),
            'thursday' => __('thursday'),
            'friday' => __('friday'),
            'saturday' => __('saturday'),
            'sunday' => __('sunday'),
        ];
        if($request->day){
            $this->date = $request->day;
        }
    }

    public function dateChanged()
    {
        $this->dispatch('handleDateFilter', $this->date);
    }

    public function form(Form $form)
    {
        return $form->schema([
            TextInput::make('filterDate.' .$this->getId())
                ->prefixIcon('heroicon-o-magnifying-glass')
                ->label('')
                ->placeholder(app()->getLocale() == 'en' ? 'Type Preffered Day' : 'Ketik Hari')
                ->live()
        ]);
    }

    public function render()
    {
        $data = collect($this->schema)->filter(function ($data) {
            return $this->filterDate === ''
                || str_contains(strtolower($data), strtolower($this->filterDate));
        });
        return view('livewire.doctor.date-doctor', compact('data'));
    }
}
