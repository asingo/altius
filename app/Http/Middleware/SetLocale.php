<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);
        $supportedLocales = ['en', 'id'];
        $defaultLocale = 'en';

        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
            if ($locale === $defaultLocale) {
                $newPath = preg_replace('#^' . $defaultLocale . '/#', '', $request->path());
                return redirect('/' . $newPath);
            }

        } else {
            App::setLocale($defaultLocale);
        }

        return $next($request);
    }
}
