<?php

namespace App\Livewire\Frontend\Career;

use App\Models\Career\Department;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class DepartmentCareer extends Component implements HasForms
{
    use InteractsWithForms;

    public $department = 'All Department';

    public $data = [
        'All Department',
        'Health Information Management',
        'Nurse',
        'Administration',
        'Sales',
        'Manager',
        'Radiographer'
    ];

    public function form(Form $form): Form
    {
        $locale = 'en';
        $department = Department::get()->mapWithKeys(fn ($item) => [$item->id => $item->getTranslation('title', $locale)])->toArray();
        return $form->schema([
            Select::make('department')->label('')->placeholder('')
                ->native(false)
                ->live()
                ->afterStateUpdated(fn ($state) => $this->dispatch('handleDepartmentFilter', $state))
                ->options(fn () => ['All Department', ...$department])
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.career.department-career');
    }
}
