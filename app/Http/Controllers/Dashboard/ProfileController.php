<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $isHeaderOverlay = false;
        $title = 'Profile';
        $slug = 'profile';
        return view('dashboard.profile.index', compact('isHeaderOverlay', 'title', 'slug'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
