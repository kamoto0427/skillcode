<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ApodRequest;

class ApodController extends Controller
{
    /**
     * APODの外部APIを叩き、データを取得する
     */
    public function getApod(ApodRequest $request)
    {
        Log::info('開始ログ：' . __method__);
        $base_url = config('api.NASA.APOD_URL');
        $response = Http::withQueryParameters([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'api_key' => config('api.NASA.API_KEY')
        ])->get($base_url);

        Log::info('レスポンス結果：' . $response);
        Log::info('終了ログ');
        return response()->json($response->json(), 200);
    }
}
