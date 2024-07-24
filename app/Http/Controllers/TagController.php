<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Tag;
use App\Services\PlanServices;

class TagController extends Controller
{
    private $plan;
    public function __construct(private PlanServices $plan_service)
    {
        $this->plan = new Plan();
        $this->plan_service = $plan_service;
    }

    /**
     * タグで絞り込んだプラン一覧取得
     *
     * @param $tag_id タグID
     */
    public function getPlanByTag($tag_id)
    {
        $plan = $this->plan->fetchAll();
        $tags = Tag::all();
        foreach ($plan as $data) {
            $data->amount = $this->plan_service->convertAmount($data->amount);
            $data->plan_status = $this->plan_service->convertPlanStatus($data->plan_status);
            $data->rating = $this->plan_service->convertPlanEvaluation($data->rating);
        }
        return view('planTag', compact('plan', 'tags'));
    }
}
