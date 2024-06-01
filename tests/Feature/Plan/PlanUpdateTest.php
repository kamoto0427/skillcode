<?php

namespace Tests\Feature\Plan;

use App\Models\User;
use App\Models\Tag;
use App\Models\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlanUpdateTest extends TestCase
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
     * プラン編集・削除ページの表示テスト
     */
    public function test_view_edit_or_delete()
    {
        $response = $this->actingAs($this->user)->get('/plan/editOrDelete');
        $response->assertStatus(200);
    }

    /**
     * プラン編集ページの表示テスト
     */
    public function test_view_edit()
    {
        $response = $this->actingAs($this->user)->get('/plan/edit/' . $this->plan->plan_id);
        $response->assertStatus(200);
    }

    /**
     * プラン更新処理のテスト
     */
    public function test_update_plan()
    {
        // actingAsでユーザーのログイン認証ができる※プラン編集ページはログイン認証が必要なページ
        $this->actingAs($this->user)->get('/plan/edit/' . $this->plan->plan_id);

        // プランを更新する内容のパラメータ
        $update_plan = [
            'plan_id' => $this->plan->plan_id,
            'user_id' => $this->plan->user_id,
            'tag_id' => $this->tag->tag_id,
            'plan_title' => 'プラン更新',
            'plan_explanation' => 'プラン更新しました',
            'plan_status' => 2,
            'amount' => 400,
        ];

        // from指定することで、更新前のページを指定でき、postで更新処理をする
        $response = $this->from('/plan/edit/' . $this->plan->plan_id, ['plan' => $this->plan])->post(route('plan.update'), $update_plan);

        // 302はリダイレクト成功を表す※プラン一覧ページにリダイレクト成功していることをテスト
        $response->assertStatus(302)->assertRedirect('/plan');
        // 編集したレコードがデータベースに存在するかテスト※第1引数: テーブル名, 第2引数: カラム値
        $this->assertDatabaseHas('plan', ['plan_title' => 'プラン更新']);
    }
}
