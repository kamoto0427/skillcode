<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlanCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * プラン登録画面接続テスト
     */
    public function test_view_plan_create(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/plan/create');
        $response->assertStatus(200);
    }

    /**
     * プラン登録処理テスト
     */
    public function test_create_plan(): void
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();
        $plan = [
            'user_id' => $user->user_id,
            'tag_id' => $tag->tag_id,
            'plan_title' => 'Laravelを教えます',
            'plan_explanation' => 'Laravelを全10回で教えます',
            'plan_status' => 1,
            'amount' => 10000,
        ];
        $response = $this->actingAs($user)->post('/plan/store', $plan);
        $response->assertStatus(302)->assertRedirect('/plan');
    }

    /**
     * プラン登録処理後のDB保存確認テスト
     */
    public function test_is_plan_data_store()
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();
        $plan = [
            'user_id' => $user->user_id,
            'tag_id' => $tag->tag_id,
            'plan_title' => 'Laravelを教えます',
            'plan_explanation' => 'Laravelを全10回で教えます',
            'plan_status' => 1,
            'amount' => 10000,
        ];
        $response = $this->actingAs($user)->post('/plan/store', $plan);
        $this->assertDatabaseHas('plan', [
            'user_id' => $user->user_id,
            'tag_id' => $tag->tag_id,
            'plan_title' => 'Laravelを教えます',
            'plan_explanation' => 'Laravelを全10回で教えます',
            'plan_status' => 1,
            'amount' => 10000,
        ]);
    }
}
