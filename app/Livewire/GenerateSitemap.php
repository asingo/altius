<?php

namespace App\Livewire;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Component
{
    public $sitemap = false;

    public function mount()
    {
        if (file_exists(public_path('sitemap.xml'))){
            $this->sitemap = true;
        };

    }

    public function generateSitemap()
    {
        $path = public_path('sitemap.xml');
        SitemapGenerator::create(env('APP_URL'))
            ->shouldCrawl(function ($url) {
                return empty($url->query);
            })
            ->writeToFile(public_path('sitemap.xml'));
        SitemapGenerator::create(env('APP_URL').'/articles')
            ->shouldCrawl(function ($url) {
                return empty($url->query);
            })
            ->writeToFile(public_path('articles-sitemap.xml'));
        SitemapGenerator::create(env('APP_URL').'/news')
            ->shouldCrawl(function ($url) {
                return empty($url->query);
            })
            ->writeToFile(public_path('news-sitemap.xml'));
        SitemapGenerator::create(env('APP_URL').'/health-screening')
            ->shouldCrawl(function ($url) {
                return empty($url->query);
            })
            ->writeToFile(public_path('health-screening-sitemap.xml'));
        SitemapGenerator::create(env('APP_URL').'/offers')
            ->shouldCrawl(function ($url) {
                return empty($url->query);
            })
            ->writeToFile(public_path('offers-sitemap.xml'));
        $this->sitemap = true;
        return Notification::make()->success()->title('Success')
            ->body('Sitemap generated successfully!')->send();
    }

    public function render()
    {
        return view('livewire.generate-sitemap');
    }
}
