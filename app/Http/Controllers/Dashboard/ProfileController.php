<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\Patient;
use App\Models\PatientOther;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $isHeaderOverlay = false;
        $title = 'Profile';
        $slug = 'profile';
        $other = Patient::where('is_child',true)
            ->where('parent_id', auth()->id())->get();
        return view('dashboard.profile.index', compact('isHeaderOverlay', 'title', 'slug', 'other'));
    }

    public function editProfile()
    {
        $isHeaderOverlay = false;
        $title = 'Detail Profile';
        $slug = 'detail';
        return view('dashboard.profile.detail', compact('isHeaderOverlay', 'title', 'slug'));
    }

    public function delete($id)
    {
       Patient::destroy($id);
       return response()->json(['success' => true]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to(localized_route('login'));
    }
}
