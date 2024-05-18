<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $db = DB::table('category');
        $insert = [
            [
                'category_id' => 1,
                'category_name' => 'プログラミング',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'category_id' => 2,
                'category_name' => 'マーケティング',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'category_id' => 3,
                'category_name' => 'ライティング',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ];
        $db->insert($insert);
    }
}
