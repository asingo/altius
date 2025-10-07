<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PagesResource\Pages;
use App\Filament\Resources\PagesResource\RelationManagers;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class PagesResource extends Resource
{
    use Translatable;

    protected static ?string $model = \App\Models\Pages::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(4)->schema([
                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\TextInput::make('title')
                            ->afterStateUpdated(function ($set, $state) {
                                $set('slug', Str::slug($state));
                            })
                            ->live(onBlur: true),
                        //---section about
                        Forms\Components\Grid::make(1)->schema([
                            Forms\Components\Section::make('Heading')->schema([
                                TextInput::make('heading'),
                                TextInput::make('colored_heading'),
                            ])->statePath('heading')->columns(2),
                            Forms\Components\Section::make('About Us')->schema([
                                Forms\Components\Split::make([
                                    Forms\Components\Grid::make(1)->schema([
                                        CuratorPicker::make('image'),
                                    ]),
                                     Forms\Components\Grid::make(1)->schema([
                                         TextInput::make('title'),
                                         TextInput::make('heading'),
                                         Forms\Components\RichEditor::make('content'),
                                     ])
                                ])
                            ])->statePath('about_us'),
                            Forms\Components\Section::make('Vision & Mission')->schema([
                                Forms\Components\Split::make([
                                    Forms\Components\Grid::make(1)->schema([
                                        Forms\Components\Textarea::make('vision'),
                                        CuratorPicker::make('vision_image'),
                                    ]),
                                     Forms\Components\Grid::make(1)->schema([
                                         Forms\Components\Textarea::make('mission'),
                                         CuratorPicker::make('mission_image'),
                                     ])
                                ]),
                                Forms\Components\Textarea::make('quote')
                            ])->statePath('vision'),
                            Forms\Components\Section::make('More About Altius')->schema([
                                Forms\Components\Repeater::make('grid')->label('')
                                ->schema([
                                    CuratorPicker::make('icon'),
                                    TextInput::make('title'),
                                    Textarea::make('content')->columnSpanFull(),
                                ])->columns(2)
                            ])->statePath('more_about')
                        ])->visible(fn ($get) => $get('view') == 'pages.about.index')->statePath('content')

                    ])->columnSpan(3),
                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\Section::make('Page Details')
                            ->schema([
                                Forms\Components\TextInput::make('slug'),
                                Forms\Components\Select::make('view')
                                    ->label('Template')
                                    ->live()
                                    ->options([
                                        'pages.home.index' => 'Home',
                                        'pages.about.index' => 'About',
                                        'pages.career.index' => 'Career',
                                        'pages.contact.index' => 'Contact',
                                        'pages.health-screening.index' => 'Health Screening',
                                        'pages.location.index' => 'Location',
                                        'pages.medical-professional.index' => 'Medical Professional',
                                        'pages.news.index' => 'News',
                                        'pages.offers.index' => 'Offers',
                                    ])
                            ])->columnSpan(1),
                        Forms\Components\Section::make('Featured Image')->schema([
                            CuratorPicker::make('image')
                        ])
                    ])->columnSpan(1),

                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePages::route('/create'),
            'edit' => Pages\EditPages::route('/{record}/edit'),
        ];
    }
}
