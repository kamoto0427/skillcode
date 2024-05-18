<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PlanEvaluationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $db = DB::table('plan_evaluation');
        $insert = [
            [
                'evaluation_id' => 1,
                'user_id' => 1,
                'plan_id' => 1,
                'rating' => 4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'evaluation_id' => 2,
                'user_id' => 1,
                'plan_id' => 2,
                'rating' => 5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'evaluation_id' => 3,
                'user_id' => 1,
                'plan_id' => 2,
                'rating' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $db->insert($insert);
    }
}
