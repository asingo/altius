<?php

namespace App\Class;

use App\Models\Wilayah;
use Illuminate\Support\Facades\DB;

class WilayahParser
{
    public static function getLeftQueries($column, $length)
    {
        if (DB::getDriverName() == 'mysql') {
            return 'LEFT('.$column.', '.$length.')';
        }

        return 'substr('.$column.', 1, '.$length.')';
    }

    public static function getProvinces(): array
    {
        return Wilayah::whereRaw('LENGTH(kode) = 2')->get()->pluck('nama','kode')->toArray();
    }

    public static function getRegencies($kode): array
    {
        return Wilayah::whereRaw(self::getLeftQueries('kode', 2).' = "'.$kode.'" AND LENGTH(kode) = 5')->get()->pluck('nama','kode')->toArray();
    }

    public static function getDistricts($kode): array
    {
        return Wilayah::whereRaw(self::getLeftQueries('kode', 5).' = "'.$kode.'" AND LENGTH(kode) = 8')->get()->pluck('nama','kode')->toArray();
    }

    public static function getVillages($kode): array
    {
        return Wilayah::whereRaw(self::getLeftQueries('kode', 8).' = "'.$kode.'" AND LENGTH(kode) = 13')->get()->pluck('nama','kode')->toArray();
    }
}
