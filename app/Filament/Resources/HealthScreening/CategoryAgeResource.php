<?php

namespace App\Filament\Resources\HealthScreening;

use App\Filament\Resources\HealthScreening\CategoryAgeResource\Pages;
use App\Filament\Resources\HealthScreening\CategoryAgeResource\RelationManagers;
use App\Models\HealthScreening\CategoryAge;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryAgeResource extends Resource
{
    use Translatable;

    protected static ?string $model = CategoryAge::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Health Screening';
protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Age';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Name')->required(),
                Forms\Components\TextInput::make('age')->label('Age')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Name'),
                Tables\Columns\TextColumn::make('age')->label('Age'),
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
            'index' => Pages\ListCategoryAges::route('/'),
//            'create' => Pages\CreateCategoryAge::route('/create'),
//            'edit' => Pages\EditCategoryAge::route('/{record}/edit'),
        ];
    }
}
