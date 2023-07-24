<?php

namespace Database\Seeders;

use App\Models\ForumUser;
use Illuminate\Database\Seeder;

class ForumUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ForumUser::factory(300)->create();
    }
}
