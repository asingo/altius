<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LocationResource\Pages;
use App\Filament\Resources\LocationResource\RelationManagers;
use App\Models\Location;
use App\Models\Speciality;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class LocationResource extends Resource
{
    use Translatable;
    protected static ?string $model = Location::class;

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
                            ->live(onBlur: true)->required(),
                        Forms\Components\Section::make('Heading Section')->schema([
                            CuratorPicker::make('cover_image')->required(),
                            Forms\Components\TextInput::make('heading')->required(),
                        ])->collapsible(),
                        Forms\Components\Section::make('About Location')->schema([
                            TextInput::make('about_title')->label('Title')->required(),
                            Forms\Components\Select::make('about_speciality')->label('Speciality')->options(
                                fn() => Speciality::all()->pluck('title', 'id')->toArray()
                            )->searchable()->multiple()->native(false)->required(),
                            Forms\Components\RichEditor::make('about_description')->required()->label('Description')
                        ])->collapsible(),
                        Forms\Components\Section::make('Contact Us')->schema([
                            Textarea::make('address')->label('Address')->required()->columnSpanFull(),
                            Textinput::make('general_number')->label('General Number')
                                ->prefixIcon('heroicon-s-phone')
                                ->required()
                                ->columnSpan(1),
                            Textinput::make('customer_care')->label('Customer Care')
                                ->prefixIcon('heroicon-s-phone')
                                ->required()
                                ->columnSpan(1),
                        ])->columns(2)->collapsible(),
                        Forms\Components\Section::make('Link Google Maps')->schema([
                            TextInput::make('link_maps')->label('Link Google Maps')
                            ->required(),
                            TextInput::make('link_embedded')
                                ->required()
                                ->label('Link Embed Google Maps')
                        ])
                    ])->columnSpan(3),
                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\Section::make('Page Details')
                            ->schema([
                                Forms\Components\TextInput::make('slug')->unique(ignoreRecord: true)->required(),
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
                TextColumn::make('title')->label('Title'),
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
            'index' => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocation::route('/create'),
            'edit' => Pages\EditLocation::route('/{record}/edit'),
        ];
    }
}
