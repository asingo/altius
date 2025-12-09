<?php

namespace App\Filament\Resources;

use App\Class\RoleManager;
use App\Class\TemplateConfig;
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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class PagesResource extends Resource
{
    use Translatable;

    protected static ?string $model = \App\Models\Pages::class;

    protected static ?string $navigationIcon = 'icon-pages';

    public static function canViewAny(): bool
    {
        return RoleManager::getAcl('pages', auth()->user()->role, 'view');
    }
    public static function canEdit(): bool
    {
        return RoleManager::getAcl('careers', auth()->user()->role, 'edit');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(4)->schema([
                    // LEFT SIDE
                    Forms\Components\Grid::make(1)
                        ->schema(function ($get) {

                            $map = TemplateConfig::map();
                            $view = $get('view');
                            $schema = $map[$view]['schema'] ?? [];
                            return [
                                Forms\Components\TextInput::make('title')
                                    ->label('')
                                    ->placeholder('Enter a Title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($set, $state) => $set('slug', Str::slug($state)))
                                    ->extraFieldWrapperAttributes(['class' => 'no-asterisk'])
                                    ->extraInputAttributes(['class' => '!text-2xl']),

                                ...$schema,

                                Forms\Components\Section::make('SEO Settings')
                                    ->schema([
                                        Forms\Components\TextInput::make('seo_title'),
                                        Forms\Components\TextInput::make('seo_keyword'),
                                        Forms\Components\TextInput::make('seo_description'),
                                        Forms\Components\Select::make('seo_index')
                                            ->default(true)
                                            ->options([
                                                true => 'Yes',
                                                false => 'No',
                                            ])
                                            ->native(false),
                                    ]),
                            ];
                        })
                        ->live() // ini cukup, tidak perlu reactive
                        ->columnSpan(3),

                    // RIGHT SIDE
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
                                        'pages.article.index' => 'Articles',
                                        'pages.offers.index' => 'Offers',
                                        'pages.privacy.index' => 'Privacy Policy',
                                        'pages.terms.index' => 'Terms & Conditions',
                                    ])
                                    ->afterStateUpdated(function ($state, $set) {
                                        $map = TemplateConfig::map();
                                        if (!isset($map[$state])) return;

                                        $set('controller', $map[$state]['controller']);
                                        $set('route_name', $map[$state]['route']);
                                        $set('route_name_detail', $map[$state]['detail_route']);
                                    }),

                                Forms\Components\Hidden::make('controller'),
                                Forms\Components\Hidden::make('route_name'),
                                Forms\Components\Hidden::make('route_name_detail'),
                            ]),

                        Forms\Components\Section::make('Featured Image')
                            ->schema([
                                CuratorPicker::make('image')
                            ]),
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
                Tables\Actions\ViewAction::make()->visible(fn (): bool =>
                RoleManager::getAcl('pages', auth()->user()->role, 'read')
                ),
                Tables\Actions\EditAction::make()->visible(fn (): bool =>
                RoleManager::getAcl('pages', auth()->user()->role, 'update')
                ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])->visible(fn (): bool =>
                RoleManager::getAcl('pages', auth()->user()->role, 'delete')
                ),
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
