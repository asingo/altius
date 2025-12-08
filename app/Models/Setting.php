<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $casts = [
        'value' => 'array',
    ];


    public static function getCtaSetting()
    {
        $setting =  self::where('name', 'general')->first()?->value;
        if($setting && isset($setting['cta'])) {
            return $setting['cta'];
        }
        return [];
    }
}
