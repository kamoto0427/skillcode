<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $db = DB::table('categories');
        $insert = [
            [
                'category_id' => 1,
                'category_name' => 'カテゴリー1',
                'delete_flg' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'category_id' => 2,
                'category_name' => 'カテゴリー2',
                'delete_flg' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'category_id' => 3,
                'category_name' => 'カテゴリー3',
                'delete_flg' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $db->insert($insert);
    }
}
