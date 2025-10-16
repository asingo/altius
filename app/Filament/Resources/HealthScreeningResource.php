<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HealthScreeningResource\Pages;
use App\Filament\Resources\HealthScreeningResource\RelationManagers;
use App\Models\HealthScreening;
use App\Models\Location;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class HealthScreeningResource extends Resource
{
    use Translatable;

    protected static ?string $navigationGroup = 'Health Screening';
    protected static ?string $model = HealthScreening::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(4)->schema([
                    Forms\Components\Grid::make(1)->schema([
                        TextInput::make('title')->label('Name')
                            ->afterStateUpdated(function ($set, $state) {
                                $set('slug', Str::slug($state));
                            })
                            ->live(onBlur: true)
                            ->required(),
                        Select::make('location')
                            ->options(fn() => Location::all()->pluck('title', 'id'))
                            ->native(false)
                            ->multiple()
                            ->required()
                            ->label('Location'),
                        Select::make('health_screening_category_id')
                            ->relationship('category', 'title')
                            ->native(false)
                            ->label('Category'),
                        Select::make('gender')->options([
                            'all' => 'All',
                            'male' => 'Male',
                            'female' => 'Female',
                        ])->native(false)->required(),
                        Forms\Components\CheckboxList::make('ages')
            ->options(fn() => HealthScreening\CategoryAge::get()->mapWithKeys(fn($item) => [$item->id => $item->title . ' - ' . $item->age])),
                        TextInput::make('price')->label('Price')->numeric()->required()
                        ->prefix('Rp'),
                        Forms\Components\Textarea::make('description')->label('Description')->required(),
                    ])->columnSpan(3),
                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\Section::make('Page Details')
                            ->schema([
                                Forms\Components\TextInput::make('slug')->unique(ignoreRecord: true)->required(),
                            ])->columnSpan(1),
                        Forms\Components\Section::make('Featured Image')->schema([
                            CuratorPicker::make('image')->required()
                        ])
                    ])->columnSpan(1),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Name'),
                TextColumn::make('hasLocation.location.title')->label('Location'),
                TextColumn::make('category.title')->label('Category'),
                TextColumn::make('price')->label('Price')
                    ->formatStateUsing(fn($state) => 'Rp '. number_format(
                        $state,
                        0,
                        ',',
                        '.'
                    ))
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListHealthScreenings::route('/'),
            'create' => Pages\CreateHealthScreening::route('/create'),
            'edit' => Pages\EditHealthScreening::route('/{record}/edit'),
        ];
    }
}
