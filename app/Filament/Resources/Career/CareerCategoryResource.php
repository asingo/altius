<?php

namespace App\Filament\Resources\Career;

use App\Filament\Resources\Career\CareerCategoryResource\Pages;
use App\Filament\Resources\Career\CareerCategoryResource\RelationManagers;
use App\Models\Career\CareerCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CareerCategoryResource extends Resource
{
    use Translatable;
    protected static ?string $navigationGroup = 'Career';
    protected static ?string $model = CareerCategory::class;
    protected static ?string $navigationLabel = 'Category';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->label('Category Name')->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Category Name')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->modalWidth('lg'),
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
            'index' => Pages\ListCareerCategories::route('/'),
//            'create' => Pages\CreateCareerCategory::route('/create'),
//            'edit' => Pages\EditCareerCategory::route('/{record}/edit'),
        ];
    }
}
