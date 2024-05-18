<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $db = DB::table('plan');
        $insert = [
            [
                'plan_id' => 1,
                'user_id' => 1,
                'tag_id' => 1,
                'plan_title' => 'PHPのアプリ作成のサポートをします',
                'plan_explanation' => 'PHPのアプリ作成のサポートをします',
                'plan_status' => 1,
                'amount' => 1000,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'plan_id' => 2,
                'user_id' => 2,
                'tag_id' => 2,
                'plan_title' => 'Laravelのアプリ作成のサポートをします',
                'plan_explanation' => 'Laravelのアプリ作成のサポートをします',
                'plan_status' => 1,
                'amount' => 2000,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'plan_id' => 3,
                'user_id' => 3,
                'tag_id' => 2,
                'plan_title' => 'Laravelのアプリ作成のサポートをしてください',
                'plan_explanation' => 'Laravelのアプリ作成のサポートをしてください',
                'plan_status' => 2,
                'amount' => 3000,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $db->insert($insert);
    }
}
