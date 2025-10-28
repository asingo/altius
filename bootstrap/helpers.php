<?php
if (! function_exists('localized_route')) {
    /**
     * Generate a localized URL based on the current app locale.
     *
     * Example:
     *  localized_route('about') → /about or /id/about
     *
     * @param  string  $name     The route name (e.g. 'about')
     * @param  array   $params   Route parameters (optional)
     * @return string
     */
    function localized_route(string $name, array $params = []): string
    {
        $locale = app()->getLocale();
        $url = route($name . '_' . $locale, $params, false); // relative path

        // Only prepend /id if locale is id and URL doesn't already start with /id
        if ($locale === 'id' && !str_starts_with($url, '/id')) {
            $url = '/id' . (str_starts_with($url, '/') ? $url : "/$url");
        }

        return $url;
    }
}
