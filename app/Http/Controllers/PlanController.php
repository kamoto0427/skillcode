<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\PlanEvaluation;
use App\Services\PlanServices;

class PlanController extends Controller
{
    public function __construct(PlanServices $plan_service)
    {
        $this->plan = new Plan();
        $this->plan_evaluation = new PlanEvaluation();
        $this->plan_service = $plan_service;
    }

    /**
     * プラン一覧取得
     */
    public function get()
    {
        $plan = $this->plan->fetchAll();
        foreach ($plan as $data) {
            $data->amount = $this->plan_service->convertAmount($data->amount);
            $data->plan_status = $this->plan_service->convertPlanStatus($data->plan_status);
            $data->rating = $this->plan_service->convertPlanEvaluation($data->rating);
        }
        return view('plan', compact('plan'));
    }

    /**
     * プラン登録画面
     */
    public function createView()
    {
        return view('planStore');
    }

    /**
     * プラン登録・更新
     */
    public function upsert(Request $request) {
        Plan::create([
            "plan_title" => $request->plan_title,
            "plan_explanation" => $request->plan_explanation,
            "plan_status" => $request->plan_status,
            "amount" => $request->amount,
        ]);
    }
}
