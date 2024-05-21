<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_title',
        'plan_explanation',
        'plan_status',
        'amount',
    ];

    // テーブル
    protected $table = 'plan';

    // 主キー
    protected $primaryKey = 'plan_id';

    /**
     * プラン一覧データの取得
     */
    public function fetchAll(){
        $data = DB::select(
            'SELECT
                plan.plan_id,
                plan.user_id,
                plan.tag_id,
                plan.plan_title,
                plan.plan_explanation,
                plan.plan_status,
                plan.amount,
                users.user_name,
                users.icon_image,
                plan_e.rating
            FROM
                plan
            INNER JOIN users ON plan.user_id = users.user_id
            LEFT JOIN(
                SELECT
                    plan_id,
                    AVG(rating) AS rating
                FROM
                    plan_evaluation
                GROUP BY
                    plan_id
            ) AS plan_e
            ON
                plan_e.plan_id = plan.plan_id
            '
        );

        return $data;
    }
}
