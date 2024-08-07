<?php

namespace App\Functions;

use GuzzleHttp\Client;
use Illuminate\Support\Str;

class Helper
{
    public static function generateSlug($string, $model)
    {
        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        $exist = $model::where('slug', $slug)->first();

        $count = 1;

        while ($exist) {
            $slug = $original_slug . '-' . $count;
            $exist = $model::where('slug', $slug)->first();
            $count++;
        }

        return $slug;
    }


    // funzione per formato date
    public static function formatDate($data)
    {

        $date = date_create($data);
        return date_format($date, 'd/m/Y');
    }

    public static function formatDateandTime($data)
    {

        $date = date_create($data);
        return date_format($date, 'd/m/Y H:i:s');
    }



}
