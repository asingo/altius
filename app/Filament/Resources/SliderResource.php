<?php

namespace App\Filament\Resources;

use App\Class\RoleManager;
use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderResource extends Resource
{
    use Translatable;

    protected static ?string $model = Slider::class;

    protected static ?string $navigationGroup = 'Slider';

//    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function canViewAny(): bool
    {
        return RoleManager::getAcl('slider', auth()->user()->role, 'view');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label('Heading')->columnSpanFull()->required(),
                TextInput::make('description')->label('Description')->columnSpanFull()->required(),
                CuratorPicker::make('image')->label('Image')->columnSpanFull()->required()
                    ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/gif', 'image/webp']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('image')->label('Image')->width('200px'),
                TextColumn::make('title')->label('Heading'),
                TextColumn::make('description')->label('Description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('index')
            ->reorderable('index')
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
            'index' => Pages\ListSliders::route('/'),
//            'create' => Pages\CreateSlider::route('/create'),
//            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
