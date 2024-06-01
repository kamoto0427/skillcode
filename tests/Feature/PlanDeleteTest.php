<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Tag;
use App\Models\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlanDeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * それぞれのメソッドが実行される前に行う処理
     */
    public function setUp(): void
    {
        parent::setUp();
        // プランデータの削除は、plan_idとuser_idが一致するデータを削除するので、明示的に指定
        $this->user = User::factory()->create(['user_id' => 1]);
        $this->tag = Tag::factory()->create();
        $this->plan = Plan::factory()->create(['plan_id' => 1, 'user_id' => 1]);
    }

    /**
     * プラン削除処理のテスト
     */
    public function test_delete_plan()
    {
        // 削除前のデータがDBに存在するか確認するテスト※第1引数: テーブル名, 第2引数: カラム値
        $this->assertDatabaseHas('plan', ['plan_id' => $this->plan->plan_id]);
        // プランの削除処理
        $response = $this->actingAs($this->user)->from(route('plan.editOrDelete'))->delete(route('plan.delete', ['plan_id' => $this->plan->plan_id]));
        // 削除後、プラン一覧画面にリダイレクトするか確認するテスト
        $response->assertStatus(302)->assertRedirect('/plan');
        // 削除後のデータがDBに存在しないか確認するテスト
        $this->assertDatabaseMissing('plan', ['plan_id' => $this->plan->plan_id]);
    }
}
