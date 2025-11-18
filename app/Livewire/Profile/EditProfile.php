<?php

namespace App\Livewire\Profile;

use App\Class\WilayahParser;
use App\Forms\Components\UploadProfile;
use App\Models\Patient;
use App\Models\PatientOther;
use App\Models\User;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Session;
use Storage;

class EditProfile extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

    public $data;

    public ?int $id = null;

//    protected array $formFields = [];

    public function mount(): void
    {
        $user = User::find(auth()->id());
        $patient = $user->patient()?->first();
        $this->id = request()->get('id');
        if($this->id != null){
            $user = Patient::find($this->id);
            $patient = $user;
        }
        $schema = [
            'name' => null,
            'id_number' => null,
            'gender' => null,
            'blood_type' => null,
            'date_of_birth' => null,
            'place_of_birth' => null,
            'email' => null,
            'wa_number' => null,
            'address' => null,
            'province' => null,
            'regency' => null,
            'subdistrict' => null,
            'rt_rw' => null,
            'postal_code' => null,
            'street' => null,
            'photo' => null,
            ...$user->toArray(),
            ...$patient?->toArray() ?? []
        ];
//        dd($schema);
        $this->form->fill();
        $this->photoForm->fill();
        $this->data = $schema;


    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Fieldset::make(__('Biography'))->schema([
                TextInput::make('name')->label(__('Name')),
                TextInput::make('id_number')->label(__('ID Number')),
                Select::make('gender')->label(__('Gender'))->options([
                    'male' => __('Male'),
                    'female' => __('Female'),
                ])->native(false),
                Select::make('blood_type')->label(__('Blood Type'))->options([
                    'A+' => 'A+',
                    'A-' => 'A-',
                    'B+' => 'B+',
                    'B-' => 'B-',
                    'O+' => 'O+',
                    'O-' => 'O-',
                    'AB+' => 'AB+',
                    'AB-' => 'AB-'
                ])->native(false),
                DatePicker::make('date_of_birth')->label(__('Date of Birth'))
                    ->suffixIcon('heroicon-o-calendar')->native(false),
                TextInput::make('place_of_birth')->label(__('Place of Birth')),
                TextInput::make('email')->label(__('Email'))
                    ->email(),
                TextInput::make('wa_number')->label(__('WhatsApp Number'))
            ]),
            Fieldset::make(__('Address'))->schema([
                TextInput::make('address')->label(__('Address')),
                Select::make('province')
                    ->label(__('Province'))
                    ->options(fn () => WilayahParser::getProvinces())
                    ->native(false)
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Reset regency & subdistrict ketika province berubah
                        $set('regency', null);
                        $set('subdistrict', null);
                    }),

                Select::make('regency')
                    ->label(__('Regency'))
                    ->options(fn ($get) => WilayahParser::getRegencies($get('province')))
                    ->native(false)
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Reset subdistrict ketika regency berubah
                        $set('subdistrict', null);
                    }),
                Select::make('subdistrict')->label(__('Subdistrict'))
                    ->options(fn ($get) => WilayahParser::getDistricts($get('regency')))
                    ->native(false)
                    ->live(),
                TextInput::make('rt_rw')->label(__('RT/RW')),
                TextInput::make('postal_code')->label(__('Postal Code'))->numeric(),
                TextInput::make('street')->label(__('Street'))
            ])
        ])->statePath('data');
    }

    public function photoForm(Form $form): Form
    {
        return $form->schema([
            UploadProfile::make('photo')->label('')->disk('public')
//                ->directory('patients')
//                ->image()->multiple(false)
        ])->statePath('data');
    }

    public function submitProfile()
    {

        $userData = collect($this->data)->only(['name', 'email'])->toArray();
        if($this->data['photo'] instanceof TemporaryUploadedFile){
            $this->data['photo'] = $this->data['photo']->store('patients', 'public');
            if(auth()->user()->patient()->exists()){
                $old = auth()->user()->patient->photo;
                if ($old && Storage::disk('public')->exists($old)) {
                    Storage::disk('public')->delete($old);
                }
            }

        }
        $patientData = collect($this->data)->only([
            'id_number', 'gender', 'blood_type', 'date_of_birth',
            'place_of_birth', 'wa_number', 'address', 'province',
            'regency', 'subdistrict', 'rt_rw', 'postal_code',
            'street', 'photo'
        ])->toArray();

        if($this->id != null){
            Patient::find($this->id)->update([
                ...$userData, ...$patientData
            ]);
        }else{
            auth()->user()->update($userData);

            if (auth()->user()->patient()->exists()) {
                auth()->user()->patient()->update($patientData);
            } else {
                auth()->user()->patient()->create($patientData);
            }
        }


        $this->dispatch('successSubmit');
    }

    protected function getForms(): array
    {
        return [
            'form',
            'photoForm'
        ];
    }

    public function render()
    {
        $isHeaderOverlay = false;
        $title = 'Edit Profile';
        $slug = 'edit';
        $id = $this->id;
        return view('livewire.profile.edit-profile', compact('id'))->layout('dashboard.profile.detail', compact('isHeaderOverlay', 'title', 'slug'));;
    }
}
