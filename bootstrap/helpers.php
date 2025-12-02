<?php

use App\Models\Setting;

if (!function_exists('localized_route')) {
    /**
     * Generate a localized URL based on the current app locale.
     *
     * Example:
     *  localized_route('about') → /about or /id/about
     *
     * @param string $name The route name (e.g. 'about')
     * @param array $params Route parameters (optional)
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

if (!function_exists('limit_words')) {
    function limit_words($string, $words = 10)
    {
        $wordsArray = explode(' ', trim($string));
        if (count($wordsArray) > $words) {
            $string = implode(' ', array_slice($wordsArray, 0, $words)) . '...';
        } else {
            $string = implode(' ', $wordsArray);
        }

        return $string;
    }
}

if (!function_exists('get_wa_link')) {
    function get_wa_link($title)
    {
        $cta = Setting::getCtaSetting();
        if ($cta) {
            $number = $cta['whatsapp'];
            $text = app()->getLocale() == 'en' ? $cta['prefix_en'] : $cta['prefix_id'];
            return 'https://wa.me/' . $number . '?text=' . $text . ' ' . $title;
        }
        return '#';
    }
}

if (!function_exists('tracking_before')) {
    function tracking_before()
    {
        $seo = Cache::rememberForever('seo_tracking', function () {
            $value = Setting::where('name', 'seo')->first()?->value;

            return is_string($value) ? json_decode($value, true) : $value;
        });

        return $seo['before_body'] ?? null;
    }
}

if (!function_exists('tracking_after')) {
    function tracking_after()
    {
        $seo = Cache::rememberForever('seo_tracking', function () {
            $value = Setting::where('name', 'seo')->first()?->value;

            return is_string($value) ? json_decode($value, true) : $value;
        });

        return $seo['after_body'] ?? null;
    }
}

if (! function_exists('whatsapp_number')) {
    /**
     * @param  string|null  $value
     * @return string|null  returns normalized number or null if invalid
     */
    function whatsapp_number(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $digits = preg_replace('/\D+/', '', $value);

        if (!$digits || strlen($digits) < 8) {
            return null;
        }

        if (preg_match('/^0/', $digits)) {
            $digits = '62' . preg_replace('/^0+/', '', $digits);
            return $digits;
        }

        if (preg_match('/^8\d{7,}$/', $digits)) {
            return '62' . $digits;
        }

        if (preg_match('/^62\d+$/', $digits)) {
            return $digits;
        }

        return null;
    }
}
