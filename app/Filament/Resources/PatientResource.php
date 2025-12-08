<?php

namespace App\Filament\Resources;

use App\Class\RoleManager;
use App\Class\WilayahParser;
use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Forms\Components\UploadProfile;
use App\Models\Patient;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationLabel = 'List Patients';
    protected static ?string $navigationGroup = 'Patients';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Biography')->schema([
                    TextInput::make('name')->label('Name'),
                    TextInput::make('id_number')->label('ID Number'),
                    Select::make('gender')->label('Gender')->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])->native(false),
                    Select::make('blood_type')->label('Blood Type')->options([
                        'A+' => 'A+',
                        'A-' => 'A-',
                        'B+' => 'B+',
                        'B-' => 'B-',
                        'O+' => 'O+',
                        'O-' => 'O-',
                        'AB+' => 'AB+',
                        'AB-' => 'AB-'
                    ])->native(false),
                    DatePicker::make('date_of_birth')->label('Date of Birth')
                        ->suffixIcon('heroicon-o-calendar')->native(false),
                    TextInput::make('place_of_birth')->label('Place of Birth'),
                    TextInput::make('email')->label('Email')
                        ->email(),
                    TextInput::make('wa_number')->label('WhatsApp Number')
                ]),
                Fieldset::make('Address')->schema([
                    TextInput::make('address')->label('Address'),
                    Select::make('province')
                        ->label('Province')
                        ->options(fn () => WilayahParser::getProvinces())
                        ->native(false)
                        ->live()
                        ->afterStateUpdated(function ($state, callable $set) {
                            // Reset regency & subdistrict ketika province berubah
                            $set('regency', null);
                            $set('subdistrict', null);
                        }),

                    Select::make('regency')
                        ->label('Regency')
                        ->options(fn ($get) => WilayahParser::getRegencies($get('province')))
                        ->native(false)
                        ->live()
                        ->afterStateUpdated(function ($state, callable $set) {
                            // Reset subdistrict ketika regency berubah
                            $set('subdistrict', null);
                        }),
                    Select::make('subdistrict')->label('Subdistrict')
                        ->options(fn ($get) => WilayahParser::getDistricts($get('regency')))
                        ->native(false)
                        ->live(),
                    TextInput::make('rt_rw')->label('RT/RW'),
                    TextInput::make('postal_code')->label('Postal Code')->numeric(),
                    TextInput::make('street')->label('Street')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('wa_number')->label('WhatsApp')
               ->getStateUsing(fn($record) => $record->wa_number ?? '-'),
                Tables\Columns\TextColumn::make('created_at')->label('Created At'),
            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
            Tables\Actions\ViewAction::make()->visible(fn (): bool =>
            RoleManager::getAcl('patients', auth()->user()->role, 'read')
            ),
                Tables\Actions\DeleteAction::make()->visible(fn (): bool =>
                RoleManager::getAcl('patients', auth()->user()->role, 'delete')
                ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])->visible(fn (): bool =>
                RoleManager::getAcl('patients', auth()->user()->role, 'delete')
                ),
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
