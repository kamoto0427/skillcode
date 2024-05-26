<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tag_id',
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
        '
            SELECT
                plan.plan_id,
                plan.user_id,
                plan.tag_id,
                plan.plan_title,
                plan.plan_explanation,
                plan.plan_status,
                plan.amount,
                users.user_name,
                users.icon_image,
                tag.tag_name,
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
            INNER JOIN tag ON tag.tag_id = plan.tag_id
            ORDER BY plan_e.rating DESC
        ');

        return $data;
    }

    /**
     * プラン取得(1件)
     */
    public function fetch($plan)
    {
        $params = [
            'plan_id' => $plan->plan_id,
            'user_id' => $plan->user_id,
            'tag_id' => $plan->tag_id,
        ];

        $data = DB::select(
            '
                SELECT
                    plan.plan_title,
                    plan.plan_explanation,
                    plan.plan_status,
                    plan.amount,
                    users.user_id,
                    users.user_name,
                    users.icon_image,
                    tag.tag_name,
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
                INNER JOIN tag ON tag.tag_id = plan.tag_id
                WHERE
                plan.plan_id = :plan_id
                AND users.user_id = :user_id
                AND tag.tag_id = :tag_id
        ', $params);
        return $data[0];
    }

    /**
     * プラン取得(ユーザーIDをもとに該当するデータ全件取得)
     */
    public function fetchByUserId($user_id)
    {
        $params = [
            'user_id' => $user_id,
        ];

        $data = DB::select(
            '
                SELECT
                    plan.plan_id,
                    plan.plan_title,
                    plan.plan_explanation,
                    plan.plan_status,
                    plan.amount,
                    users.user_id,
                    users.user_name,
                    users.icon_image,
                    tag.tag_name,
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
                INNER JOIN tag ON tag.tag_id = plan.tag_id
                WHERE
                    users.user_id = :user_id
        ', $params);
        return $data;
    }

    /**
     * プランの削除(1件)
     */
    public function planDelete($params)
    {
        DB::table($this->table)
            ->where('plan_id', $params['plan_id'])
            ->where('user_id', $params['user_id'])
            ->delete();
    }
}
