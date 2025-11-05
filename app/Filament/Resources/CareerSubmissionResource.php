<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerSubmissionResource\Pages;
use App\Filament\Resources\CareerSubmissionResource\RelationManagers;
use App\Models\CareerSubmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CareerSubmissionResource extends Resource
{
    protected static ?string $model = CareerSubmission::class;

//    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Career';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Submission';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
TextEntry::make('full_name')->label('Name'),
            TextEntry::make('email')->label('Email'),  TextEntry::make('phone')->label('Phone'),
            TextEntry::make('province')->label('Province'),
            TextEntry::make('city')->label('City'),
            TextEntry::make('job_title')->label('Job Title'),
            TextEntry::make('location')->label('Location'),
            TextEntry::make('cv')->label('Resume')
            ->icon('heroicon-o-document-text')
            ->color('primary')
            ->formatStateUsing(fn($state) => '<a href="'.asset('storage/'.$state).'" target="_blank">Download</a>')
            ->html(),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->label('Date')->sortable(),
                TextColumn::make('full_name')->label('Name')->sortable(),
                TextColumn::make('phone')->label('Phone')->sortable(),
                TextColumn::make('province')->label('Province')->sortable(),
                TextColumn::make('city')->label('City')->sortable(),
                TextColumn::make('job_title')->label('Job Title')->sortable(),
               TextColumn::make('cv')->label('Resume')
                   ->icon('heroicon-o-document-text')
                   ->color('primary')
                ->formatStateUsing(fn($state) => '<a href="'.asset('storage/'.$state).'" target="_blank">Download</a>')
                ->html(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCareerSubmissions::route('/'),
            'create' => Pages\CreateCareerSubmission::route('/create'),
//            'edit' => Pages\EditCareerSubmission::route('/{record}/edit'),
        ];
    }
}
