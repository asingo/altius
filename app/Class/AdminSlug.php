<?php

namespace App\Class;

use App\Models\Setting;

class AdminSlug
{
    public static function getSlug()
    {
        $setting = Setting::where('name', 'hide_login')->first();
        $slug = 'admin';
        if($setting != null){
            if($setting->value[0] != '' && $setting->value[0] != null){
                $slug = $setting->value[0];
            }
        }
        return $slug;
    }
}
