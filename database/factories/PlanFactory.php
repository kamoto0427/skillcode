<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();
        $tag = Tag::factory()->create();
        return [
            'user_id' => $user->user_id,
            'tag_id' => $tag->tag_id,
            'plan_title' => 'Laravelを教えます',
            'plan_explanation' => 'Laravelを全10回で教えます',
            'plan_status' => 1,
            'amount' => 10000,
        ];
    }
}
