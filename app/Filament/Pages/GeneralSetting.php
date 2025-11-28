<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use App\View\Components\Grid;
use Artisan;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class GeneralSetting extends Page implements HasForms
{
    use InteractsWithForms;

//    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.general-setting';

    protected static ?string $navigationLabel = 'General';

    protected static ?string $navigationGroup = 'Settings';

    public ?array $general = [];

    public function mount()
    {
        $setting = Setting::where('name', 'general')->first()?->value ?? null;
//        $this->form->fill();
        if ($setting) {
            $this->general = $setting;
            $this->general['site']['logo_primary'] = [Media::find($setting['site']['logo_primary'])];
            $this->general['site']['logo_alternative'] = [Media::find($setting['site']['logo_alternative'])];
            $this->general['site']['favicon'] = [Media::find($setting['site']['favicon'])];
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

    protected function getHeaderActions(): array
    {
        return [
            Action::make('saveSetting')->action(fn() => $this->saveSetting())
            ->icon('heroicon-o-paper-airplane')
            ->iconPosition('after'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '#' => 'Setting',
            '' => 'General'
        ];
    }

    public function siteForm(Form $form): Form
    {
        $schema = [
            Section::make('Site Information')->schema([
                CuratorPicker::make('logo_primary')
                ->maxWidth("50px"),
                CuratorPicker::make('logo_alternative'),
                CuratorPicker::make('favicon'),
                Toggle::make('is_no_robots')->label('Disable Search Engine Tracking for this site'),
            ])->columns(3)->statePath('site'),
        ];
        return $form->schema($schema)->statePath('general');
    }

    public function contactForm(Form $form): Form
    {
        $schema = [
            Section::make('Contact & Social Media')->schema([
                Split::make([
                    Section::make('Contact')->schema([
                        \Filament\Forms\Components\Grid::make(1)->schema([
                            TextInput::make('email'),
                            TextInput::make('phone'),
                            TextInput::make('whatsapp'),
                            TextInput::make('link_maps'),
                            TextInput::make('emergency')->prefix('(021)')->label('Emergency Number')
                        ]),
                    ]),
                    Section::make('Social Media')->schema([
                        Repeater::make('social_media')->label('')->schema([
                            CuratorPicker::make('icon')->columnSpan(1)->extraAttributes(['class' => 'squared-icon']),
                            TextInput::make('link')->columnSpan(3),
                        ])->columns(4),
                    ])


                ])
            ])->statePath('contact')
        ];
        return $form->schema($schema)->statePath('general');
    }

    public function ctaForm(Form $form): Form
    {
        $schema = [
            Section::make('CTA Setting')->schema([
                Fieldset::make('Message Prefix')->schema([
                    TextInput::make('prefix_en')->label('Prefix EN'),
                    TextInput::make('prefix_id')->label('Prefix ID'),
                ]),
                TextInput::make('whatsapp')->label('Whatsapp Number')
                ->helperText('Please use only numbers e.g 6281230000'),
            ])->statePath('cta')
        ];
        return $form->schema($schema)->statePath('general');
    }

    public function emailConfigForm(Form $form): Form
    {
        return $form->schema([
            Section::make('Email / SMTP Configuration')->schema([
                TextInput::make('smtp_host')->label('SMTP Host')->columnSpan(2),
                TextInput::make('smtp_port')->label('SMTP Port'),
                Select::make('smtp_encryption')->label('SMTP Encryption')->options([
                    'none' => 'No Encryption',
                    'ssl' => 'SSL',
                    'tls' => 'TLS'
                ])
            ])->columns(4),
            Section::make('Authentication')->schema([
                TextInput::make('smtp_username')->label('SMTP Username'),
                TextInput::make('smtp_password')->label('SMTP Password')->password()->revealable(),
            ])->columns(2)
        ])->statePath('general.email');
    }

    protected function getForms(): array
    {
        return [
            'siteForm',
            'contactForm',
            'ctaForm',
            'emailConfigForm'
        ];
    }

//    public function form(Form $form): Form
//    {
////        $schema = [];
////        if($this->type=='site'){
//        $schema = [
//            Tabs::make('')->tabs(
//                [
//                    Tabs\Tab::make('Site Information')->schema([
//                        Section::make('Site Information')->schema([
//                            CuratorPicker::make('logo_primary'),
//                            CuratorPicker::make('logo_alternative'),
//                            CuratorPicker::make('favicon'),
//                            Toggle::make('is_no_robots')->label('Disable Search Engine Tracking for this site'),
//                        ])->columns(3)->statePath('site'),
//                    ])
//                ]
//            ),
//
//            Section::make('Contact & Social Media')->schema([
//                Split::make([
//                    Section::make('Contact')->schema([
//                        \Filament\Forms\Components\Grid::make(1)->schema([
//                            TextInput::make('email'),
//                            TextInput::make('phone'),
//                            TextInput::make('whatsapp'),
//                            TextInput::make('link_maps'),
//                            TextInput::make('emergency')->prefix('(021)')->label('Emergency Number')
//                        ]),
//                    ]),
//                    Section::make('Social Media')->schema([
//                        Repeater::make('social_media')->label('Social Media')->schema([
//                            CuratorPicker::make('icon'),
//                            TextInput::make('link')
//                        ]),
//                    ])
//
//
//                ])
//            ])->statePath('contact')
//        ];
////        }
////        if($this->type=='contact'){
////            $schema = [
////
////            ];
////        }
//        return $form->schema($schema)->statePath('general');
//    }

    public function saveSetting()
    {
        $form = [...$this->siteForm->getState(), ...$this->contactForm->getState(), ...$this->ctaForm->getState(), ...['email' =>$this->emailConfigForm->getState()]];

        $setting = Setting::where('name', 'general');
        if ($setting->exists()) {
            $setting->update([
                'value' => $form
            ]);
        } else {
            Setting::create([
                'name' => 'general',
                'value' => $form
            ]);
        }
        Artisan::call('config:clear');
        return Notification::make()->success()->title('Success')->body('Setting saved successfully!')->send();
    }
}
