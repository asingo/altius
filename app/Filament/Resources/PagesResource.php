<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PagesResource\FormSchema;
use App\Filament\Resources\PagesResource\Pages;
use App\Filament\Resources\PagesResource\RelationManagers;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class PagesResource extends Resource
{
    use Translatable;

    protected static ?string $model = \App\Models\Pages::class;

    protected static ?string $navigationIcon = 'icon-pages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(4)->schema([
                    Forms\Components\Grid::make(1)->schema(function ($get) {
                        $schema = [];
                        if ($get('view') == 'pages.about.index') {
                            $schema = FormSchema::about();
                        }
                        if($get('view') == 'pages.home.index'){
                            $schema = FormSchema::home();
                        }
                        if($get('view') == 'pages.career.index'){
                            $schema = FormSchema::career();
                        }
                        if($get('view') == 'pages.location.index'||$get('view') == 'pages.health-screening.index'||$get('view') == 'pages.offers.index'){
                            $schema = FormSchema::general();
                        }
                        if($get('view') == 'pages.medical-professional.index'){
                            $schema = FormSchema::withHero();
                        }
                        if($get('view') == 'pages.news.index'){
                            $schema = FormSchema::withHeroAndBody();
                        }
                        if($get('view') == 'pages.contact.index'){
                            $schema = FormSchema::contact();
                        }
                        if($get('view') == 'pages.privacy.index' || $get('view') == 'pages.terms.index'){
                            $schema = FormSchema::generalAccordion();
                        }

                        return [
                            Forms\Components\TextInput::make('title')
                                ->label('')->placeholder('Enter a Title')
                                ->afterStateUpdated(function ($set, $state) {
                                    $set('slug', Str::slug($state));
                                })
                                ->required()
                                ->extraFieldWrapperAttributes(['class' => 'no-asterisk'])
                                ->extraInputAttributes(['class' => '!text-2xl'])
                                ->live(onBlur: true),
                            ...$schema
                            ,

                        ];
                    })->columnSpan(3),
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
                                        'pages.privacy.index' => 'Privacy Policy',
                                        'pages.terms.index' => 'Terms & Conditions',
                                    ])->afterStateUpdated(function ($state, $set) {
                                        $controller = match ($state) {
                                            'pages.home.index' => 'App\Http\Controllers\Pages\HomeController',
                                            'pages.about.index' => 'App\Http\Controllers\Pages\AboutController',
                                            'pages.location.index' => 'App\Http\Controllers\Pages\LocationController',
                                            'pages.medical-professional.index' => 'App\Http\Controllers\Pages\DoctorController',
                                            'pages.career.index' => 'App\Http\Controllers\Pages\CareerController',
                                            'pages.health-screening.index' => 'App\Http\Controllers\Pages\ScreeningController',
                                            'pages.contact.index' => 'App\Http\Controllers\Pages\ContactController',
                                            'pages.news.index' => 'App\Http\Controllers\Pages\NewsController',
                                            'pages.offers.index' => 'App\Http\Controllers\OffersController',
                                            'pages.privacy.index' => 'App\Http\Controllers\Pages\PrivacyController',
                                            'pages.terms.index' => 'App\Http\Controllers\Pages\TermsController',
                                            default => null
                                        };

                                        $route_name = match ($state) {
                                            'pages.home.index' => 'home',
                                            'pages.about.index' => 'about',
                                            'pages.location.index' => 'location',
                                            'pages.medical-professional.index' => 'doctor',
                                            'pages.career.index' => 'career',
                                            'pages.health-screening.index' => 'screening',
                                            'pages.contact.index' => 'contact',
                                            'pages.news.index' => 'news',
                                            'pages.offers.index' => 'offers',
                                            'pages.privacy.index' => 'privacy',
                                            'pages.terms.index' => 'terms',
                                            default => null

                                        };

                                        $route_name_detail = match ($state) {
                                            'pages.location.index' => 'locationDetail',
                                            'pages.medical-professional.index' => 'doctorDetail',
                                            'pages.career.index' => 'careerDetail',
                                            'pages.news.index' => 'newsDetail',
                                            'pages.screening.index' => 'screeningDetail',
                                            'pages.offers.index' => 'offersDetail',
                                            default => null

                                        };

                                        $set('controller', $controller);
                                        $set('route_name', $route_name);
                                        $set('route_name_detail', $route_name_detail);
                                    }),
                                Forms\Components\Hidden::make('controller'),
                                Forms\Components\Hidden::make('route_name'),
                                Forms\Components\Hidden::make('route_name_detail'),
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
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('created_at'),
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
