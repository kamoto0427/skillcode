<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\PlanRequest;
use App\Http\Requests\PlanUpdateRequest;
use App\Models\Plan;
use App\Models\Tag;
use App\Models\PlanEvaluation;
use App\Services\PlanServices;

class PlanController extends Controller
{
    public function __construct(PlanServices $plan_service)
    {
        $this->plan = new Plan();
        $this->tag = new Tag();
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
     * プラン詳細
     *
     */
    public function show(Plan $plan)
    {
        $plan_show = $this->plan->fetch($plan);
        $plan_show->amount = $this->plan_service->convertAmount($plan_show->amount);
        $plan_show->plan_status = $this->plan_service->convertPlanStatus($plan_show->plan_status);
        $plan_show->rating = $this->plan_service->convertPlanEvaluation($plan_show->rating);
        return view('planShow', compact('plan_show'));
    }

    /**
     * プラン登録画面
     */
    public function createView()
    {
        $tags = Tag::all();
        return view('planStore', compact('tags'));
    }

    /**
     * プラン登録
     */
    public function store(PlanRequest $request) {
        $user_id = Auth::user()->user_id;
        Plan::create([
            'user_id' => $user_id,
            'tag_id' => $request->tag_id,
            "plan_title" => $request->plan_title,
            "plan_explanation" => $request->plan_explanation,
            "plan_status" => $request->plan_status,
            "amount" => $request->amount,
        ]);
        session()->flash('planCreateSuccess','プランの登録が完了しました。');
        return Redirect::to('plan');
    }

    /**
     * プラン編集または削除画面
     */
    public function editOrDeleteView()
    {
        $user_id = Auth::user()->user_id;
        $plan = $this->plan->fetchByUserId($user_id);
        return view('planEditOrDelete', compact('plan'));
    }

    /**
     * プラン編集画面
     */
    public function editView(Plan $plan)
    {
        $tags = Tag::all();
        return view('planEdit', compact('plan', 'tags'));
    }

    /**
     * プラン更新
     */
    public function update(PlanUpdateRequest $request)
    {
        $this->plan->planUpdate($request);
        return Redirect::to('plan');
    }

    /**
     * プランの削除
     */
    public function delete($plan_id)
    {
        $user_id = Auth::user()->user_id;
        $params = [
            'plan_id' => $plan_id,
            'user_id' => $user_id,
        ];
        $this->plan->planDelete($params);
        return Redirect::to('plan');
    }
}
