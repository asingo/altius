<?php

namespace App\Livewire\Frontend\Career\Detail;

use App\Class\WilayahParser;
use App\Models\Career;
use App\Models\CareerSubmission;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Session;

class SubmitForm extends Component implements HasForms
{
    use InteractsWithForms;
    public $formData = [];
    public $career;


    public function mount($career): void
    {
        $this->career = Career::find($career);
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('fullname')
                ->label(__('Full Name'))
                ->required()
                ->placeholder(__('Enter your full name'))
                ->prefixIcon('heroicon-o-user-circle')
                ->validationMessages([
                    'required' => __('Please fill in your full name'),
                ]),
            TextInput::make('email')
                ->label(__('Email'))
                ->required()
                ->placeholder(__('Enter your email'))
                ->prefixIcon('heroicon-o-envelope')
                ->regex('/^.+@.+$/i')
                ->validationMessages([
                    'required' => __('Please provide a valid email address'),
                    'regex' => __('Please provide a valid email address'),
                ]),
            TextInput::make('phone')
                ->label(__('No. HP/ WhatsApp'))
                ->placeholder(__('Enter your phone or whatsapp number'))
                ->prefixIcon('heroicon-o-phone')
                ->required()
                ->validationMessages([
                    'required' => __('Please provide a valid phone number'),
                ]),
            Grid::make(['default' => 1, 'md' => 2])->schema(
                [
                    Select::make('province')
                        ->placeholder(__('Choose Province'))
                        ->prefixIcon('heroicon-o-map')
                        ->label(__('Province'))
                        ->options(fn () => WilayahParser::getProvinces())
                        ->native(false)
                        ->live()
                        ->afterStateUpdated(function ($state, callable $set) {
                            // Reset regency & subdistrict ketika province berubah
                            $set('regency', null);
                            $set('subdistrict', null);
                        })
                        ->required()
                        ->validationMessages([
                            'required' => __('Please select a province'),
                        ]),

                    Select::make('city')
                        ->placeholder(__('Choose City'))
                        ->prefixIcon('heroicon-o-map')
                        ->label(__('City'))
                        ->options(fn ($get) => WilayahParser::getRegencies($get('province')))
                        ->native(false)
                        ->live()
                        ->required()
                        ->afterStateUpdated(function ($state, callable $set) {
                            // Reset subdistrict ketika regency berubah
                            $set('subdistrict', null);
                        })
                        ->validationMessages([
                            'required' => __('Please select a city'),
                        ]),
                ]
            ),
            FileUpload::make('photo')
                ->label(__('Upload Resume/ CV (PDF/JPG)'))
                ->maxSize(2048)
                ->directory('resume')
                ->previewable(false)
                ->preserveFilenames()
                ->helperText('*'.__('Maximum File Size').' 2 MB')
                ->required()
                ->validationMessages([
                    'required' => __('Please upload a valid resume file'),
                ]),
            FileUpload::make('pendukung')
                ->label(__('Upload Requirement Docs'))
                ->maxSize(2048)
                ->directory('pendukung')
                ->previewable(false)
                ->preserveFilenames()
                ->helperText('*'.__('Maximum File Size').' 2 MB')
                ->validationMessages([
                    'required' => __('Please upload a valid document'),
                ]),
            Checkbox::make('acceptance')
                ->label(__('By using this form, you agree to the storage and handling of data by this website.'))
                ->required()
                ->validationMessages([
                    'required' => __('Please agree to the terms'),
                ]),
        ])->statePath('formData');
    }

    public function submitCareer()
    {
        $form = $this->form->getState();
        $career = $this->career;
        DB::beginTransaction();
        try {
            CareerSubmission::create([
                'full_name' => $form['fullname'],
                'email' => $form['email'],
                'phone' => $form['phone'],
                'province' => $form['province'],
                'city' => $form['city'],
                'cv' => $form['photo'],
                'job_title' => $career->title,
                'location' => $career->location->title,
                'pendukung' => $form['pendukung'] ?? ''
            ]);
            DB::commit();
            return redirect()->route('successSubmission_'.app()->getLocale());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Career Submission Error: ' . $e->getMessage());
//            return redirect()->back();
            Session::flash('error', 'Error');
            return redirect()->back();
        }


    }

    public function render()
    {
        return view('livewire.frontend.career.detail.submit-form');
    }
}
