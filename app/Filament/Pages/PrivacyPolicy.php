<?php

namespace App\Filament\Pages;

use App\Class\RoleManager;
use App\Models\Setting;
use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use FilamentTiptapEditor\TiptapEditor;

class PrivacyPolicy extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.privacy-policy';

    protected static ?string $navigationGroup = 'Settings';

    protected static bool $shouldRegisterNavigation = false;
    public ?array $privacy_policy = [];

    public static function canAccess(): bool
    {
        return RoleManager::getAcl('settings', auth()->user()->role, 'view');
    }

    public function mount()
    {
//        $this->privacy_policy = Setting::where('name', 'privacy_policy')->first()?->value ?? [];
        $this->form->fill();
        $this->privacy_policy = Setting::where('name', 'privacy_policy')->first()?->value ?? [];

    }

    protected function getHeaders(): array
    {
        return [
            'breadrumbs' => $this->getBreadcrumbs(),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '#' => 'Setting',
            '' => 'General'
        ];
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Content English')->schema([
                TiptapEditor::make('content_en')->label('')
            ]),
            Section::make('Content Bahasa Indonesia')->schema([
                TiptapEditor::make('content_id')->label('')
            ]),
            Section::make('FAQ')->schema([
                Repeater::make('faq')->label('')
                ->schema([
                    Split::make([
                        Grid::make(1)->schema([
                            TextInput::make('title_en')->label('Title English'),
                            TiptapEditor::make('content_en')->label('Content English'),
                        ]),
                        Grid::make(1)->schema([
                            TextInput::make('title_id')->label('Title Bahasa Indonesia'),
                            TiptapEditor::make('content_id')->label('Content Bahasa Indonesia'),
                        ])
                    ])
                ])->itemLabel(fn($state) => $state['title_en'] . ($state['title_id'] ? ' | '. $state['title_id'] : ''))->live()
                ->collapsible()
            ])
        ])->statePath('privacy_policy');
    }

    public function saveSetting()
    {
        $setting = Setting::where('name', 'privacy_policy');
        if ($setting->exists()) {
            $setting->update([
                'value' => $this->form->getState()
            ]);
        } else {
            Setting::create([
                'name' => 'privacy_policy',
                'value' => $this->form->getState()
            ]);
        }

        return Notification::make()->success()->title('Success')->body('Setting saved successfully!')->send();
    }
}
