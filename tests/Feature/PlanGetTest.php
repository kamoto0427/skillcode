<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Tag;
use App\Models\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlanGetTest extends TestCase
{
    use RefreshDatabase;

    /**
     * それぞれのメソッドが実行される前に行う処理
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->tag = Tag::factory()->create();
        $this->plan = Plan::factory()->create();
    }

    /**
     * プラン一覧画面の表示テスト
     */
    public function test_view_plan_get()
    {
        // actingAsでユーザー認証を実現し、プラン一覧画面を表示する
        $response = $this->actingAs($this->user)->get('/plan');
        // コントローラーからviewに変数が渡っているかのテスト
        $response->assertViewHas('plan');

        // データベースと一致する値があるかテスト
        $data = Plan::find($this->plan->plan_id);
        // 第1引数: チェック値, 第2引数: DBの値
        $this->assertEquals($this->plan->plan_id, $data->plan_id);
        // 画面の表示に成功しているかのテスト
        $response->assertStatus(200);
    }
}
