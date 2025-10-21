<?php

namespace App\Filament\Resources\PagesResource;

use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\TiptapEditor;

class FormSchema
{
    public static function about(): array
    {
        return [
            Grid::make(1)->schema([
                Section::make('Heading')->schema([
                    TextInput::make('heading'),
                    TextInput::make('colored_heading'),
                ])->statePath('heading')->columns(2),
                Section::make('About Us')->schema([
                    Split::make([
                        Grid::make(1)->schema([
                            CuratorPicker::make('image'),
                        ]),
                        Grid::make(1)->schema([
                            TextInput::make('title'),
                            TextInput::make('heading'),
                            TiptapEditor::make('content'),
                        ])
                    ])
                ])->statePath('about_us'),
                Section::make('About Us - 2')->schema([
                    Split::make([
                        Grid::make(1)->schema([
                            TextInput::make('title'),
                            TextInput::make('heading'),
                            TiptapEditor::make('content'),
                        ]),
                        Grid::make(1)->schema([
                            CuratorPicker::make('image'),
                        ])
                    ])
                ])->statePath('about_us_2'),
                Section::make('Vision & Mission')->schema([
                    Split::make([
                        Grid::make(1)->schema([
                            Textarea::make('vision')->rows(6),
                            CuratorPicker::make('vision_image'),
                        ]),
                        Grid::make(1)->schema([
                            Textarea::make('mission')->rows(6),
                            CuratorPicker::make('mission_image'),
                        ])
                    ]),
                    Textarea::make('quote')
                ])->statePath('vision'),
                Section::make('More About Altius')->schema([
                    Repeater::make('grid')->label('')
                        ->schema([
                            CuratorPicker::make('icon'),
                            TextInput::make('title'),
                            Textarea::make('content')->columnSpanFull(),
                        ])->grid(3)
                ])->statePath('more_about')
            ])->hidden(fn ($get) => $get('view') !== 'pages.about.index')
                ->dehydrated(fn ($get) => $get('view') == 'pages.about.index')->statePath('content')
        ];
    }

    public static function home(): array
    {
        return [
            Grid::make(1)->schema([
                Section::make('About')->schema([
                    Split::make([
                        Grid::make(1)->schema([
                            CuratorPicker::make('image'),
                        ]),
                        Grid::make(1)->schema([
                            TextInput::make('title'),
                            TextInput::make('heading'),
                            TiptapEditor::make('content'),
                            TextInput::make('button_label'),
                        ])
                    ])
                ])->statePath('about'),
                Section::make('Testimony')->schema([
                    TextInput::make('title'),
                    TextInput::make('heading'),
                ])->statePath('testimony'),
                Section::make('Full Screen Image')->schema([
                    CuratorPicker::make('image'),

                ])->statePath('full_screen'),
                Section::make('Health Screening')->schema([
                    TextInput::make('title'),
                    TextInput::make('heading'),
                    TextInput::make('button_label'),
                ])->statePath('health_screening'),
                Section::make('Offer')->schema([
                    TextInput::make('title'),
                    TextInput::make('heading'),
                    TextInput::make('button_label'),
                ])->statePath('offer'),
            ])->hidden(fn ($get) => $get('view') !== 'pages.home.index')
        ->dehydrated(fn ($get) => $get('view') == 'pages.home.index')
                ->statePath('content')
        ];
    }

    public static function general(): array
    {
        return [
            Grid::make(1)->schema([
                Section::make('Section')->schema([
                    TextInput::make('title'),
                    TextInput::make('heading'),
                ])->statePath('section'),
            ])->hidden(fn ($get) => match ($get('view')) {
                'pages.location.index' => false,
                'pages.health-screening.index' => false,
                'pages.offers.index' => false,
                default => true
            })->dehydrated(fn ($get) => match ($get('view')) {
                'pages.location.index' => true,
                'pages.health-screening.index' => true,
                'pages.offers.index' => true,
                default => false
            })->statePath('content')
        ];
    }

    public static function withHero(): array
    {
        return [
            Grid::make(1)->schema([
                Section::make('Section')->schema([
                    TextInput::make('heading'),
                    TextInput::make('subheading'),
                ])->statePath('section'),
            ])->hidden(fn ($get) => match ($get('view')) {
                'pages.medical-professional.index' => false,
                'pages.news.index' => false,
                default => true
            })->dehydrated(fn ($get) => match ($get('view')) {
                'pages.medical-professional.index' => true,
                'pages.news.index' => true,
                default => false
            })->statePath('content')
        ];
    }

    public static function career(): array
    {
        return [
            Grid::make(1)->schema([
                Section::make('Hero Section')->schema([
                    TextInput::make('heading'),
                    TextInput::make('subheading'),
                ])->statePath('section'),
                Section::make('Body Section')->schema([
                    TextInput::make('title'),
                    Textarea::make('description')->rows(6),
                ])->statePath('body'),
                Section::make('Warning Section')->schema([
                    TextInput::make('title'),
                    Textarea::make('description')->rows(6),
                ])->statePath('warning'),
            ])->hidden(fn ($get) => $get('view') !== 'pages.career.index')
                ->dehydrated(fn ($get) => $get('view') == 'pages.career.index')->statePath('content')
        ];
    }
}
