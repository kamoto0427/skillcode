<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Services\ErrorService;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'title',
        'explanation',
        'published_date',
        'published_flg',
        'delete_flg',
    ];

    // テーブル
    protected $table = 'blogs';

    // 主キー
    protected $primaryKey = 'blog_id';

    /**
     * 公開済み投稿一覧取得
     */
    public function fetchPublished($errorService)
    {
        $data = DB::table($this->table)
                ->select(
                    'blog_id',
                    'title',
                    'explanation',
                    'published_date'
                )
                ->where('delete_flg', 0)
                ->where('published_flg', 1)
                ->orderByDesc('published_date')
                ->get();

        if (count($data) === 0) {
            return $errorService->abort(404, 'データが0件です。');
        }
        return $data;
    }
}
