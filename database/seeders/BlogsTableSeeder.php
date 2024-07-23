<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $db = DB::table('blogs');
        $insert = [
            [
                'blog_id' => 1,
                'title' => 'java',
                'explanation' => 'javaのテスト',
                'published_date' => new DateTime(),
                'published_flg' => 0,
                'delete_flg' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'blog_id' => 2,
                'title' => 'Laravel',
                'explanation' => 'javaのテスト',
                'published_date' => new DateTime(),
                'published_flg' => 1,
                'delete_flg' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'blog_id' => 3,
                'title' => 'Python',
                'explanation' => 'pythonのテスト',
                'published_date' => new DateTime(),
                'published_flg' => 1,
                'delete_flg' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ];
        $db->insert($insert);
    }
}
