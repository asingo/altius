<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Doctor extends Model
{
    use Sushi;

    public function getRows()
    {
        $data = file_get_contents(base_path('database/schema/doctor-altius.json'));
        return json_decode($data, true);
    }

    protected $casts = [
        'location' => 'array',
        'schedule' => 'array',
    ];
}
