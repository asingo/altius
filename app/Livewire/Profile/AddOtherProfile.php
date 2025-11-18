<?php

namespace App\Livewire\Profile;

use App\Class\WilayahParser;
use App\Forms\Components\UploadProfile;
use App\Models\Patient;
use App\Models\PatientOther;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Storage;

class AddOtherProfile extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

    public $data;

//    protected array $formFields = [];

    public function mount(): void
    {
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
//            ...auth()->user()->toArray(),
//            ...auth()->user()->patient()->first()?->toArray() ?? []
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
                TextInput::make('name')->label(__('Name'))->required(),
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
                TextInput::make('email')->label('Email')->required()
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
                TextInput::make('rt_rw')->label('RT/RW'),
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

        $data = collect($this->data)->toArray();
        if($data['photo'] instanceof TemporaryUploadedFile){
            $data['photo'] = $data['photo']->store('patients', 'public');
//            if(auth()->user()->patient()->exists()){
//                $old = auth()->user()->patient->photo;
//                if ($old && Storage::disk('public')->exists($old)) {
//                    Storage::disk('public')->delete($old);
//                }
//            }

        }
        $data['parent_id'] = auth()->id();
        $data['is_child']= true;
        Patient::create($data);

        $this->dispatch('successSubmit',  ['url' => localized_route('profile')]);
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
        $title = __('Add Profile');
        $slug = 'add';
        return view('livewire.profile.add-other-profile')->layout('dashboard.profile.detail', compact('isHeaderOverlay', 'title', 'slug'));
    }
}
