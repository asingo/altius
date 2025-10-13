<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmergencyResource\Pages;
use App\Filament\Resources\EmergencyResource\RelationManagers;
use App\Models\Emergency;
use App\Models\Location;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\Select;
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

class EmergencyResource extends Resource
{
    use Translatable;
    protected static ?string $model = Emergency::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Service & Facility';

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
                            ->label('Location'),
                        Forms\Components\RichEditor::make('content')->label('Content'),
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
                TextColumn::make('title')->label('Name')->searchable(),
                TextColumn::make('location')
                    ->getStateUsing(fn ($record) => $record->hasLocation()->exists() ?
                        $record->hasLocation()->get()->map(fn ($location) => $location->location?->title) : '-'
                    ),
                TextColumn::make('created_at')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListEmergencies::route('/'),
            'create' => Pages\CreateEmergency::route('/create'),
            'edit' => Pages\EditEmergency::route('/{record}/edit'),
        ];
    }
}
