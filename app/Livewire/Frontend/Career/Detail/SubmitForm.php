<?php

namespace App\Livewire\Frontend\Career\Detail;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class SubmitForm extends Component implements HasForms
{
    use InteractsWithForms;

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('fullname')->label('Full Name')->required(),
            TextInput::make('email')->label('Email')
                ->required()
                ->regex('/^.+@.+$/i'),
            TextInput::make('phone')->label('No. HP/ WhatsApp')->required(),
            Grid::make(['default' => 1, 'md' => 2])->schema(
                [
                    Select::make('province')->label('Province')->required()->placeholder('Choose Province')
                        ->options([
                            'Jawa Timur' => 'Jawa Timur',
                            'Jawa Tengah' => 'Jawa Tengah',
                            'Jawa Barat' => 'Jawa Barat',
                        ])->native(false),
                    Select::make('city')->label('City')->required()->placeholder('Choose City')
                        ->options([
                            'Jawa Timur' => 'Jawa Timur',
                            'Jawa Tengah' => 'Jawa Tengah',
                            'Jawa Barat' => 'Jawa Barat',
                        ])->native(false),
                ]
            ),
            FileUpload::make('photo')->label('Upload Resume/ CV (PDF/JPG)')
                ->maxSize(2048)
                ->helperText('*Maximum File Size 2 MB')
                ->required(),
            Checkbox::make('acceptance')->label('By using this form, you agree to the storage and handling of data by this website.')->required()
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.career.detail.submit-form');
    }
}
