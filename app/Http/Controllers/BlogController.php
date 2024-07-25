<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Blog;
use App\Services\ErrorService;

class BlogController extends Controller
{
    private $blog;
    public function __construct(private ErrorService $errorService)
    {
        $this->blog = new Blog();
        $this->errorService = $errorService;
    }

    /**
     * 公開済み投稿一覧取得API
     */
    public function getPublishedData()
    {
        try {
            $blogs = $this->blog->fetchPublished($this->errorService);
        } catch (\Exception $e) {
            Log::error('データが取得できませんでした。');
            throw $e;
        }
        return response()->json(['blogs'=> $blogs]);
    }
}
