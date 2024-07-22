<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PlanEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
    ];

    // テーブル
    protected $table = 'plan_evaluation';

    /**
     * プラン評価の取得※重複するデータがる場合は平均値を出して取得する
     */
    public function fetchAll(){
        $data = DB::table($this->table)
                ->select('plan_id')
                ->selectRaw('AVG(rating) as rating')
                ->groupBy('plan_id')
                ->get();

        return $data;
    }
}
