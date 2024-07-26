<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApodController extends Controller
{
    /**
     * APODの外部APIを叩き、データを取得する
     */
    public function getApod()
    {
        Log::info('開始ログ：' . __method__);
        $base_url = config('api.NASA.APOD_URL');
        $response = Http::withQueryParameters([
            'start_date' => '2024-07-01',
            'end_date' => '2024-07-08',
            'api_key' => config('api.NASA.API_KEY')
        ])->get($base_url);

        Log::info('レスポンス結果：' . $response);
        Log::info('終了ログ');
        return response()->json($response->json(), 200);
    }
}
