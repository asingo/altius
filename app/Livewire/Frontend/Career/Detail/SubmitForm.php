<?php

namespace App\Livewire\Frontend\Career\Detail;

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
            TextInput::make('fullname')->label('Full Name')->required(),
            TextInput::make('email')->label('Email')
                ->required()
                ->regex('/^.+@.+$/i'),
            TextInput::make('phone')->label('No. HP/ WhatsApp')->required(),
            Grid::make(['default' => 1, 'md' => 2])->schema(
                [
                    Select::make('province')->label('Province')->required()->placeholder('Choose Province')
                        ->options([
                            'Jawa Timur' => 'Jawa Timur',
                            'Jawa Tengah' => 'Jawa Tengah',
                            'Jawa Barat' => 'Jawa Barat',
                        ])->native(false),
                    Select::make('city')->label('City')->required()->placeholder('Choose City')
                        ->options([
                            'Jawa Timur' => 'Jawa Timur',
                            'Jawa Tengah' => 'Jawa Tengah',
                            'Jawa Barat' => 'Jawa Barat',
                        ])->native(false),
                ]
            ),
            FileUpload::make('photo')->label('Upload Resume/ CV (PDF/JPG)')
                ->maxSize(2048)
                ->directory('resume')
                ->previewable(false)
                ->preserveFilenames()
                ->helperText('*Maximum File Size 2 MB')
                ->required(),
            Checkbox::make('acceptance')->label('By using this form, you agree to the storage and handling of data by this website.')->required()
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
