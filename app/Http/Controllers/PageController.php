<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function resolve($locale = null, $any = null){

        $segment = explode('/', $any);
        $page = Pages::where('slug->'. $locale, $segment[0])->first();
    }
}
