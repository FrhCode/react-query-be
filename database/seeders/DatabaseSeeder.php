<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(DataSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ForumSeeder::class);
        $this->call(ForumUserSeeder::class);
    }
}
