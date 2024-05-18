<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $db = DB::table('tag');
        $insert = [
            [
                'tag_id' => 1,
                'category_id' => 1,
                'tag_name' => 'PHP',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_id' => 2,
                'category_id' => 1,
                'tag_name' => 'Laravel',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_id' => 3,
                'category_id' => 1,
                'tag_name' => 'Python',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $db->insert($insert);
    }
}
