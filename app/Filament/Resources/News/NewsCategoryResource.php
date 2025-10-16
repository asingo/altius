<?php

namespace App\Filament\Resources\News;

use App\Filament\Resources\News\NewsCategoryResource\Pages;
use App\Filament\Resources\News\NewsCategoryResource\RelationManagers;
use App\Models\News\NewsCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsCategoryResource extends Resource
{
    use Translatable;
    protected static ?string $model = \App\Models\NewsCategory::class;

    protected static ?string $navigationGroup = 'News';
    protected static ?string $navigationLabel = 'Category';
protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListNewsCategories::route('/'),
//            'create' => Pages\CreateNewsCategory::route('/create'),
//            'edit' => Pages\EditNewsCategory::route('/{record}/edit'),
        ];
    }
}
