<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use App\View\Components\Grid;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class GeneralSetting extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.general-setting';

    protected static ?string $navigationLabel = 'General';

    protected static ?string $navigationGroup = 'Settings';

    public ?array $general = [];

    public function mount()
    {
        $setting = Setting::where('name', 'general')->first()?->value ?? null;
        $this->form->fill();
        if ($setting) {
            $this->general = $setting;
//
            $this->general['contact']['social_media'] = collect($setting['contact']['social_media'])->map(function ($item) {
                $item['icon'] = [Media::find($item['icon'])];
                return $item;
            })->toArray();
        }

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
            Section::make('Contact & Social Media')->schema([
                Split::make([
                    \Filament\Forms\Components\Grid::make(1)->schema([
                        TextInput::make('email'),
                        TextInput::make('phone'),
                        TextInput::make('whatsapp'),
                        TextInput::make('link_maps'),
                        TextInput::make('emergency')->prefix('(021)')->label('Emergency Number')
                    ]),
                    Repeater::make('social_media')->label('Social Media')->schema([
                        CuratorPicker::make('icon'),
                        TextInput::make('link')
                    ]),
                ])
            ])->statePath('contact')
        ])->statePath('general');
    }

    public function saveSetting()
    {
        $setting = Setting::where('name', 'general');
        if ($setting->exists()) {
            $setting->update([
                'value' => $this->form->getState()
            ]);
        } else {
            Setting::create([
                'name' => 'general',
                'value' => $this->form->getState()
            ]);
        }

        return Notification::make()->success()->title('Success')->body('Setting saved successfully!')->send();
    }
}
