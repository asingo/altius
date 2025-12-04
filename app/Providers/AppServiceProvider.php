<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Support\Facades\FilamentIcon;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Livewire\Livewire;
use Spatie\Translatable\Translatable;

class AppServiceProvider extends ServiceProvider
{
    protected function generateDynamicHeading(): string
    {
        $controller = request()->route()?->getController();
        $controllerClass = request()->route()?->getControllerClass();

        if (method_exists($controller, 'getTopBarTitle')) {
            return $controller->getTopBarTitle();
        }

        if ($controller && method_exists($controller, 'getResource')) {
            $resource = $controller::getResource();

            if (method_exists($controller, 'getTitle')) {
                return $controller->getTitle();
            }

            if (class_exists($resource)) {
                // Prefer Navigation Title → Label → Model Label
                if (method_exists($resource, 'getNavigationTitle')) {
                    return $resource::getNavigationTitle();
                }
                if (method_exists($resource, 'getNavigationLabel')) {
                    return $resource::getNavigationLabel();
                }
                if (method_exists($resource, 'getModelLabel')) {
                    return $resource::getModelLabel();
                }
            }
        }

        if ($controllerClass && class_exists($controllerClass)) {
            $page = new $controllerClass();

            if (method_exists($page, 'getTitle')) {
                return $page->getTitle();
            }
            if (method_exists($page, 'getNavigationTitle')) {
                return $page->getNavigationTitle();
            }
            if (method_exists($page, 'getNavigationLabel')) {
                return $page->getNavigationLabel();
            }
        }

        return 'Dashboard';
    }

    protected function generateBreadcrumbs()
    {
        $controller = request()->route()?->getController();
        $controllerClass = request()->route()?->getControllerClass();
        $uri = explode('/',request()->route()->uri);
        $breadcrumbs = [
            env('APP_URL') .'/'. $uri[0] => 'Home'
        ];

        if (method_exists($controller, 'getBreadcrumbs')) {
            $breadcrumbs = array_merge($breadcrumbs,$controller->getBreadcrumbs());
        }

        return $breadcrumbs;
    }

    protected function generateHeaderActions()
    {
        $controller = request()->route()?->getController();
        $controllerClass = request()->route()?->getControllerClass();

//        if (method_exists($controller, 'getHeaderActions')) {
//            $breadcrumbs = $controller->getHeaderActions();
//        }

//        return $breadcrumbs;
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        \URL::forceScheme('https');
        \Spatie\Translatable\Facades\Translatable::fallback('en');
//        FilamentView::registerRenderHook(
//            PanelsRenderHook::TOPBAR_START,
//            function(){
//                $heading = $this->generateDynamicHeading();
//                $breadcrumbs = $this->generateBreadcrumbs();
//                return view('components.navigation.header', compact('heading', 'breadcrumbs'));
//            }
//        );
        FilamentView::registerRenderHook(
            PanelsRenderHook::SIDEBAR_NAV_START,
            fn() => view('filament.user-info', [
                'user' => auth()->user(),
            ])
        );

//        FilamentView::registerRenderHook(
//            PanelsRenderHook::BODY_END,
//            fn() => view('filament.footer-info')
//        );

//        FilamentView::registerRenderHook(
//            PanelsRenderHook::TOPBAR_END,
//            function(){
//                $controller = request()->route()?->getController();
//                $controllerClass = request()->route()?->getControllerClass();
//                $actions = $controller->getHeaderActions();
//                return Livewire::mount('filament.header-action', ['actions' => $actions]);
//            }
//        );
    }
}
