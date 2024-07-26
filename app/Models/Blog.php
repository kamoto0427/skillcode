<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function fetchPublished($responseService)
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
            return $responseService->abort(404, 'データが0件です。');
        }
        return $data;
    }

    /**
     * 登録処理
     */
    public function create($request)
    {
        DB::table($this->table)
            ->insert([
                'title' => $request['title'],
                'explanation' => $request['explanation'],
                'published_date' => $request['published_date'],
                'published_flg' => $request['published_flg'],
                'delete_flg' => $request['delete_flg'],
        ]);
    }
}
