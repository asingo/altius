<?php

namespace App\Livewire\Settings;

use App\Models\Setting;
use Artisan;
use Awcodes\Curator\Models\Media;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class RoleManagement extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

    public $admin = [
        'doctors' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'patients' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'pages' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'services' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'health-screening' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'offers' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'news' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'careers' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'media' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'locations' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'testimonies' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'slider' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'feedback' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
        'settings' => [
            'create' => true,
            'view' => true,
            'update' => true,
            'delete' => true,
            'deny' => true,
        ],
    ];
    public $content = [
        'doctors' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'patients' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'pages' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'services' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'health-screening' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'offers' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'news' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'careers' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'media' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'locations' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'testimonies' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'slider' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'feedback' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'settings' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
    ];
    public $hr = [
        'doctors' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'patients' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'pages' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'services' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'health-screening' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'offers' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'news' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'careers' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'media' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'locations' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'testimonies' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'slider' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'feedback' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
        'settings' => [
            'create' => false,
            'view' => false,
            'update' => false,
            'delete' => false,
            'deny' => false,
        ],
    ];

    public function mount(): void
    {
        $setting = Setting::where('name', 'role')->first()?->value ?? null;
        if ($setting) {
            $this->form->fill($setting);
        }
    }

    protected function schema()
    {
        /*    CheckboxList::make('doctors')
                        ->label('')
                        ->options([
                            'create' => 'Create',
                            'view' => 'View',
                            'update' => 'Update',
                            'delete' => 'Delete',
                            'deny'   => 'Deny',
                        ])
                        ->columns(5)
                        ->columnSpanFull()
                        ->live()
                        ->afterStateUpdated(function ( callable $set, $get) {
                            if (in_array('deny', $get('doctors'))) {
                                $set('doctors', ['deny']);
                                return;
                            }
                            if (! empty($state)) {
                                $set('doctors', array_values(array_diff($get('doctors'), ['deny'])));
                            }
                        })
                ])->columnSpanFull(),*/
        return [
            Grid::make(3)->schema([
                Section::make('Doctors')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('doctors')->collapsible(),
                Section::make('Patients')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('patients')->collapsible(),
                Section::make('Pages')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('pages')->collapsible(),
                Section::make('Services')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('services')->collapsible(),
                Section::make('Health Screening')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('health-screening')->collapsible(),
                Section::make('Offers')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('offers')->collapsible(),
                Section::make('News')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('news')->collapsible(),
                Section::make('Careers')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('careers')->collapsible(),
                Section::make('Media')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('media')->collapsible(),
                Section::make('Locations')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('locations')->collapsible(),
                Section::make('Testimonies')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('testimonies')->collapsible(),
                Section::make('Slider')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('slider')->collapsible(),
                Section::make('Feedback')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('feedback')->collapsible(),
                Section::make('Settings')->schema([
                    Toggle::make('create')->label('Create')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('view')->label('View')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('update')->label('Update')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('delete')->label('Delete')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('deny', false);
                            }
                        }),
                    Toggle::make('deny')->label('Deny')
                        ->live()
                        ->afterStateUpdated(function (callable $set, $state) {
                            if ($state) {
                                $set('create', false);
                                $set('view', false);
                                $set('update', false);
                                $set('delete', false);
                            }
                        }),
                ])->columns(2)->columnSpan(1)->statePath('settings')->collapsible(),
            ])


        ];
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Administrator')->tabs([
                Tab::make('Administrator')->schema($this->schema())
                    ->statePath('admin')->columns(4),
                Tab::make('Content Manager')->schema($this->schema())
                    ->statePath('content')->columns(4),
                Tab::make('HR')->schema($this->schema())
                    ->statePath('hr')->columns(4)
            ])

        ]);

    }

    public function saveRole()
    {
        $form = $this->form->getState();
        $setting = Setting::where('name', 'role');
        if ($setting->exists()) {
            $setting->update([
                'value' => $form
            ]);
        } else {
            Setting::create([
                'name' => 'role',
                'value' => $form
            ]);
        }
        return Notification::make()->success()->title('Success')->body('Setting saved successfully!')->send();
    }

    public function render()
    {
        return view('livewire.settings.role-management');
    }
}
