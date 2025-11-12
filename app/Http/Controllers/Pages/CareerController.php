<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CareerController extends Controller
{
    public function career(){
        $data = Career::get();
        $isHeaderOverlay = true;
        $view = 'pages.career.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        return view($view, compact('data', 'page', 'isHeaderOverlay', 'title', 'slug'));
    }

    public function careerDetail($slug)
    {
        $data = Career::get();
        if ($data->where('slug', $slug)->isEmpty()) {
            abort(404);
        }
        $view = $data->firstWhere('slug', $slug);
        $page = Pages::where('view', 'pages.career.index')->first();
        $isHeaderOverlay = false;
        $slug = 'career';
        $title = $view['title'];
        Session::flash('single_content', $view->toArray());
        return view('pages.career.single', compact('view', 'title', 'isHeaderOverlay', 'page', 'slug'));
    }


    public function successSubmission()
    {
        $locale = app()->getLocale();
        $title = 'Career Submission';
        $isHeaderOverlay = false;
        $slug = 'thank-you';
        $heading = 'Your application has been submitted!';
        $buttonLabel = 'Back to Home';
        $description = '<p>Thank you for apply job with us at Altius Hospitals.</p><p>Our team will review your application and contact you if your profile matches our requirements.</p>';
        if($locale == 'id'){
            $heading = 'Lamaran anda telah dikirim!';
            $buttonLabel = 'Kembali ke Beranda';
            $description = '<p>Terima Kasih telah mengirim lamaran di Altius Hospitals.</p><p>Tim kami akan me-review lamaran dan akan menghubungi anda apabila cocok dengan kebutuhan kami.</p>';
        }
        return view('typ', compact('title', 'isHeaderOverlay', 'slug', 'heading', 'description', 'buttonLabel'));
    }
}
