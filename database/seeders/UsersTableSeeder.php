<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $db = DB::table('users');
        $insert = [
            [
                'user_id' => 1,
                'user_name' => '山田',
                'email' => 'yamada@google.com',
                'email_verified_at' => new DateTime(),
                'password' => bcrypt('password'),
                'remember_token' => bcrypt('remember_token'),
                'self_introduction' => '自己紹介文',
                'icon_image' => null,
                'user_status' => 1,
                'career' => '経歴',
                'portfolio_1' => null,
                'portfolio_1_url' => null,
                'portfolio_2' => null,
                'portfolio_2_url' => null,
                'portfolio_3' => null,
                'portfolio_3_url' => null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 2,
                'user_name' => '鈴木',
                'email' => 'suzuki@google.com',
                'email_verified_at' => new DateTime(),
                'password' => bcrypt('password'),
                'remember_token' => bcrypt('remember_token'),
                'self_introduction' => '自己紹介文',
                'icon_image' => null,
                'user_status' => 1,
                'career' => '経歴',
                'portfolio_1' => null,
                'portfolio_1_url' => null,
                'portfolio_2' => null,
                'portfolio_2_url' => null,
                'portfolio_3' => null,
                'portfolio_3_url' => null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'user_id' => 3,
                'user_name' => '佐藤',
                'email' => 'sato@google.com',
                'email_verified_at' => new DateTime(),
                'password' => bcrypt('password'),
                'remember_token' => bcrypt('remember_token'),
                'self_introduction' => '自己紹介文',
                'icon_image' => null,
                'user_status' => 2,
                'career' => '経歴',
                'portfolio_1' => null,
                'portfolio_1_url' => null,
                'portfolio_2' => null,
                'portfolio_2_url' => null,
                'portfolio_3' => null,
                'portfolio_3_url' => null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        ];

        $db->insert($insert);
    }
}
