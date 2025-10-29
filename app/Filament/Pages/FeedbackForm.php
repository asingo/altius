<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class FeedbackForm extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.feedback-form';

    protected static ?string $navigationGroup = 'Feedback';

    public $feedback = [];

    protected function getHeaders(): array
    {
        return [
            'breadrumbs' => $this->getBreadcrumbs(),
        ];
    }

    public function mount(): void
    {
        $setting = Setting::where('name', 'feedback')->first()?->value ?? [];
      $this->form->fill($setting);
    }

    public function getBreadcrumbs(): array
    {
        return [
            '#' => 'Feedback',
            '' => 'Form'
        ];
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Form Detail')->schema([
                Repeater::make('feedback')->label('')->schema([
                    TextInput::make('question_en')->label('Question EN')->required(),
                    TextInput::make('question_id')->label('Question ID')->required(),
                    Select::make('type')->label('Type')->options([
                        'range' => 'Range',
                        'text' => 'Text',
                        'file' => 'File',
                        'select' => 'Select'
                    ])->live()->required()->native(false)->columnSpanFull(),
                    Repeater::make('options')->label('Add Select Option')->schema([
                        TextInput::make('option_en')->label('Option EN')->required(),
                        TextInput::make('option_id')->label('Option ID')->required(),
                    ])->hidden(fn($get) => $get('type') != 'select')->columns(2)->columnSpanFull()
                ])->addActionLabel('Add Question')->columns(2)
            ])
        ]);
    }

    public function saveForm()
    {
        $setting = Setting::where('name', 'feedback');
        if ($setting->exists()) {
            $setting->update([
                'value' => $this->form->getState()
            ]);
        } else {
            Setting::create([
                'name' => 'feedback',
                'value' => $this->form->getState()
            ]);
        }

        return Notification::make()->success()->title('Success')->body('Setting saved successfully!')->send();
    }
}
