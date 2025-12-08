<?php

namespace App\Class;

// TemplateConfig.php (buat file helper / class baru)
use App\Filament\Resources\PagesResource\FormSchema;

class TemplateConfig
{
    public static function map(): array
    {
        return [
            'pages.home.index' => [
                'schema' => FormSchema::home(),
                'controller' => 'App\Http\Controllers\Pages\HomeController',
                'route' => 'home',
                'detail_route' => null,
            ],
            'pages.about.index' => [
                'schema' => FormSchema::about(),
                'controller' => 'App\Http\Controllers\Pages\AboutController',
                'route' => 'about',
                'detail_route' => null,
            ],
            'pages.career.index' => [
                'schema' => FormSchema::career(),
                'controller' => 'App\Http\Controllers\Pages\CareerController',
                'route' => 'career',
                'detail_route' => 'careerDetail',
            ],
            'pages.contact.index' => [
                'schema' => FormSchema::contact(),
                'controller' => 'App\Http\Controllers\Pages\ContactController',
                'route' => 'contact',
                'detail_route' => null,
            ],
            'pages.location.index' => [
                'schema' => FormSchema::general(),
                'controller' => 'App\Http\Controllers\Pages\LocationController',
                'route' => 'location',
                'detail_route' => 'locationDetail',
            ],
            'pages.health-screening.index' => [
                'schema' => FormSchema::general(),
                'controller' => 'App\Http\Controllers\Pages\ScreeningController',
                'route' => 'screening',
                'detail_route' => 'screeningDetail',
            ],
            'pages.medical-professional.index' => [
                'schema' => FormSchema::withHero(),
                'controller' => 'App\Http\Controllers\Pages\DoctorController',
                'route' => 'doctor',
                'detail_route' => 'doctorDetail',
            ],
            'pages.news.index' => [
                'schema' => FormSchema::withHeroAndBody(),
                'controller' => 'App\Http\Controllers\Pages\NewsController',
                'route' => 'news',
                'detail_route' => 'newsDetail',
            ],
            'pages.article.index' => [
                'schema' => FormSchema::withHeroAndBody(),
                'controller' => 'App\Http\Controllers\Pages\ArticleController',
                'route' => 'article',
                'detail_route' => 'articleDetail',
            ],
            'pages.offers.index' => [
                'schema' => FormSchema::general(),
                'controller' => 'App\Http\Controllers\OffersController',
                'route' => 'offers',
                'detail_route' => 'offersDetail',
            ],
            'pages.privacy.index' => [
                'schema' => FormSchema::generalAccordion(),
                'controller' => 'App\Http\Controllers\Pages\PrivacyController',
                'route' => 'privacy',
                'detail_route' => null,
            ],
            'pages.terms.index' => [
                'schema' => FormSchema::generalAccordion(),
                'controller' => 'App\Http\Controllers\Pages\TermsController',
                'route' => 'terms',
                'detail_route' => null,
            ],
        ];
    }
}
