<?php

namespace App\Livewire\Auth;

use App\Mail\SendOtp;
use App\Models\Patient;
use App\Models\User;
use App\Models\VerifyOtp;
use Blade;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Session;

class CreateAccount extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

//    protected static ?string $model = \App\Models\User::class;

    public int $step = 1;

    public $data = [];

    public $otp = ['', '', '', '', '', ''];

//    public function getOtpString()
//    {
//        return implode('', $this->otp);
//    }

    protected function generateOtp()
    {
        $otp = rand(100000, 999999);
        $data = [
            'email' => $this->data['email'],
            'otp' => $otp,
            'expire_at' => now()->addMinutes(5)
        ];
        VerifyOtp::create($data);
        Mail::to($this->data['email'])->send(new SendOtp($otp));
    }

    public function nextStep()
    {
        $patient = User::where('email', $this->data['email'])->exists();
        if($patient){
            return Session::flash('errorEmail', 'Email already exists!');
        }
        $checkOtp = VerifyOtp::where('email', $this->data['email'])->exists();
        if(!$checkOtp){
          $this->generateOtp();
        }
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function mount(): void
    {
        $this->nameForm->fill();
    }

    protected function getForms():array
    {
        return [
            'nameForm',
            'passwordForm'
        ];
    }

    public function passwordForm(Form $form): Form{
        return $form->schema([
            TextInput::make('password')
                ->label('Password')
                ->placeholder(__('Enter your password'))
                ->password()
                ->revealable()
                ->required()
                ->rules([
                    'required',
                    'min:8',
                    'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).+$/u',
                ])
                ->helperText(__('Use 8+ characters with a mix of letters, numbers, and symbols.')),


            TextInput::make('password_confirmation')
                ->label(__('Confirm Password'))
                ->placeholder(__('Confirm your password'))
                ->required()
                ->password()
                ->revealable()
                ->same('password'),
        ])->statePath('data');
    }

    public function nameForm(Form $form): Form{
        return $form->schema([
            TextInput::make('name')
                ->label(__('Fullname'))
                ->placeholder(__('Enter your fullname'))
                ->required()
                ->live()
                ->afterStateUpdated(fn() => session()->remove('errorsEmail'))
                ->maxLength(255),

            TextInput::make('email')
                ->label('Email')
                ->placeholder(__('Enter your email'))
                ->required()
                ->live()
                ->afterStateUpdated(fn() => session()->remove('errorsEmail'))
                ->email()
                ->unique('users', 'email'),
        ])->statePath('data');
    }

    public function resendOtp()
    {
        $checkOtp = VerifyOtp::where('email', $this->data['email'])->exists();
        if($checkOtp){
            VerifyOtp::where('email', $this->data['email'])->delete();
        }
        $this->generateOtp();
        Session::flash('successOtp');
    }

    public function submitOtp(){
        $data = $this->data;
        $checkOtp = VerifyOtp::where('email', $data['email'])->where('otp', $this->otp)->exists();
        if(!$checkOtp){
         return Session::flash('errorOtp');
        }
        $otp = VerifyOtp::where('email', $data['email'])->where('otp', $this->otp)->first();
        if($otp->expire_at < now()){
            return Session::flash('errorOtp');
        }
        $this->step++;
    }

    public function submit()
    {
        $data = $this->data;
        $data['role'] = 'patient';
        $data['password'] = bcrypt($data['password']);
        unset($data['password_confirmation']);

        DB::beginTransaction();

        try {
            $user = User::create($data);
            Patient::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]);
            DB::commit();
            Session::flash('success', 'Account created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating account: ' . $e->getMessage());
            Session::flash('error', 'Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.create-account')->layout('auth.layout');
    }
}
