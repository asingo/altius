<?php

namespace App\Filament\Resources\Career;

use App\Filament\Resources\Career\DepartmentResource\Pages;
use App\Filament\Resources\Career\DepartmentResource\RelationManagers;
use App\Models\Career\Department;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartmentResource extends Resource
{
    use \Filament\Resources\Concerns\Translatable;
    protected static ?string $navigationGroup = 'Career';
    protected static ?string $model = Department::class;
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required()->label('Department Name')->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Department Name')
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
            'index' => Pages\ListDepartments::route('/'),
//            'create' => Pages\CreateDepartment::route('/create'),
//            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }
}
