<?php

namespace App\Livewire\Profile;

use App\Models\PatientOther;
use App\Models\User;

use Livewire\Component;


class DetailProfile extends Component
{
    protected ?int $id;
    public function mount()
    {
        $this->id = request()->get('id');
    }

    public function render()
    {
        $isHeaderOverlay = false;
        $title = 'Detail Profile';
        $slug = 'detail';
        $user = User::find(auth()->id());
        $patient = $user->patient()?->first();
        if($this->id != null){
            $user = PatientOther::find($this->id);
            $patient = $user;
        }
        $id = $this->id;
        return view('livewire.profile.detail-profile', compact('user','patient', 'id'))->layout('dashboard.profile.detail', compact('isHeaderOverlay', 'title', 'slug'));
    }
}
