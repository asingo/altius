<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DoctorResource\Pages;
use App\Filament\Resources\DoctorResource\RelationManagers;
use App\Models\Doctor;
use App\Models\Location;
use App\View\Components\Grid;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
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

class DoctorResource extends Resource
{
    use Translatable;

    protected static ?string $model = Doctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(4)->schema([
                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\TextInput::make('name')->label('Name')
                            ->afterStateUpdated(function ($set, $state) {
                                $set('slug', Str::slug($state));
                            })
                            ->live(onBlur: true)
                            ->required(),
                        Forms\Components\Select::make('speciality_id')
                            ->required()
                            ->relationship('speciality', 'title')
                            ->native(false)
                            ->columnSpanFull()
                            ->label('Speciality'),
                        Forms\Components\Select::make('location')
                            ->options(fn () => Location::all()->pluck('title', 'id'))
                            ->native(false)
                            ->required()
                            ->multiple()
                            ->afterStateUpdated(function ($set, $get, $state) {
                                $existing = $get('scheduleRepeater') ?? [];

                                $indexed = collect($existing)->keyBy('locationSchedule');

                                $newData = [];

                                foreach ($state as $locationId) {
                                    if ($indexed->has($locationId)) {
                                        $newData[] = $indexed[$locationId];
                                    } else {
                                        $newData[] = [
                                            'locationSchedule' => $locationId,
                                            'days' => [
                                                'monday' => '',
                                                'tuesday' => '',
                                                'wednesday' => '',
                                                'thursday' => '',
                                                'friday' => '',
                                                'saturday' => '',
                                                'sunday' => '',
                                            ],
                                        ];
                                    }
                                }

                                // Set the merged data
                                $set('scheduleRepeater', array_values($newData));
                            })
                            ->live()
                            ->label('Location'),
                        Forms\Components\Repeater::make('scheduleRepeater')->label('Schedule')
                            ->schema([
                                Forms\Components\Select::make('locationSchedule')
                                    ->options(fn () => Location::all()->pluck('title', 'id'))
                                    ->native(false)
                                    ->columnSpanFull()
                                    ->disabled()
                                    ->label('Location'),
                                Forms\Components\Hidden::make('locationSchedule')->label('Time')->columnSpanFull(),
                                Forms\Components\Fieldset::make('days')->label('Time Schedule')->schema([
                                    Forms\Components\TextInput::make('monday')->label('Monday')->inlineLabel(),
                                    Forms\Components\TextInput::make('tuesday')->label('Tuesday')->inlineLabel(),
                                    Forms\Components\TextInput::make('wednesday')->label('Wednesday')->inlineLabel(),
                                    Forms\Components\TextInput::make('thursday')->label('Thursday')->inlineLabel(),
                                    Forms\Components\TextInput::make('friday')->label('Friday')->inlineLabel(),
                                    Forms\Components\TextInput::make('saturday')->label('Saturday')->inlineLabel(),
                                    Forms\Components\TextInput::make('sunday')->label('Sunday')->inlineLabel(),
                                ])->columns(1)->statePath('days'),
                            ])
                            ->live()
                            ->grid(2)
                            ->addable(false)
                            ->orderColumn(false)
                            ->deletable(false),
                        TiptapEditor::make('biography')->label('Biography'),
                        TiptapEditor::make('expertise')->label('Expertise'),
                        TiptapEditor::make('education')->label('Education'),
                        TiptapEditor::make('publication')->label('Publication'),
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
                TextColumn::make('name')->label('Name'),
                TextColumn::make('speciality.title')->label('Speciality'),
                TextColumn::make('hasLocation.location.title')->label('Location')
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
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
