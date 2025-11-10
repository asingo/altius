<?php

namespace App\Livewire\Frontend\Doctor;

use App\Models\Speciality;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Http\Request;
use Livewire\Component;

class SpecialityDoctor extends Component implements HasForms
{
    use InteractsWithForms;

    public $filterSpeciality;

    public $schema;

    public $speciality = 'all';

    public function mount(Request $request): void
    {
        $speciality = Speciality::get()->pluck('title', 'id')->toArray();
        $this->schema = ['all' => __('all')] + $speciality;
        if($request->speciality_id){
            $this->speciality = $request->speciality_id;
        }
    }

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
                ->placeholder(app()->getLocale() == 'en' ? 'Type a speciality' : 'Ketik Spesialis')
                ->live()
        ]);
    }

    public function render()
    {
        $data = collect($this->schema)->filter(function ($data) {
            return $this->filterSpeciality === ''
                || str_contains(strtolower($data), strtolower($this->filterSpeciality));
        });
        return view('livewire.doctor.speciality-doctor', compact('data'));
    }
}
