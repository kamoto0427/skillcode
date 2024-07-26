<?php

use Illuminate\Support\Str;

return [

    'NASA' => [
        // NASAのAPIキー
        'API_KEY' => env('NASA_API_KEY'),

        // APODのベースURL
        'APOD_URL' => env('APOD_URL'),
    ]
];
