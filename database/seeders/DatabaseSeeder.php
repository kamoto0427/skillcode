<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(PlanEvaluationTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
    }
}
