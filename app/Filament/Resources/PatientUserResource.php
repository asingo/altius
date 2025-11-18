<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientUserResource\Pages;
use App\Filament\Resources\PatientUserResource\RelationManagers;
use App\Models\PatientUser;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientUserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = '';

    protected static ?string $navigationGroup = 'Patients';

    protected static ?string $navigationLabel = 'Patient Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::name('name')->label('Name')->disabled(),
                TextInput::name('email')->label('Email')->disabled(),
                TextInput::name('password')->label('Password')->password()->revealable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->modifyQueryUsing(fn (Builder $query) => $query->where('role', 'patient'))
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
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
            'index' => Pages\ListPatientUsers::route('/'),
            'create' => Pages\CreatePatientUser::route('/create'),
            'edit' => Pages\EditPatientUser::route('/{record}/edit'),
        ];
    }
}
