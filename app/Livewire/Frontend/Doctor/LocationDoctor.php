<?php

namespace App\Livewire\Frontend\Doctor;

use App\Models\Location;
use Illuminate\Http\Request;
use Livewire\Component;

class LocationDoctor extends Component
{
    public $data;
    public $location = 'all';

    public function locationChanged()
    {
        $this->dispatch('handleLocationFilter', $this->location);
    }

    public function mount(Request $request)
    {
        $location = Location::get()->pluck('title', 'id')->toArray();
        $all = ['all' => 'All'];
        $this->data = $all + $location;
        if($request->hospital_id){
            $this->location = $request->hospital_id;
        }
    }

    public function render()
    {
        return view('livewire.doctor.location-doctor');
    }
}
