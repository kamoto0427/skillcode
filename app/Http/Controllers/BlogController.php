<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Blog;
use App\Services\ResponseService;

class BlogController extends Controller
{
    private $blog;
    public function __construct(private ResponseService $responseService)
    {
        $this->blog = new Blog();
        $this->responseService = $responseService;
    }

    /**
     * 公開済み投稿一覧取得API
     */
    public function getPublishedData()
    {
        try {
            $blogs = $this->blog->fetchPublished($this->responseService);
        } catch (\Exception $e) {
            Log::error('データが取得できませんでした。');
            throw $e;
        }
        return response()->json(['blogs'=> $blogs]);
    }

    /**
     * 登録処理
     */
    public function registerBlog()
    {
        \Log::debug('aaa');
    }
}
