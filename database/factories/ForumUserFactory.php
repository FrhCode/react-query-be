<?php

namespace Database\Factories;

use App\Models\Forum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ForumUser;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ForumUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ForumUser::class;

    public function definition(): array
    {
        return [
            'user_id' =>  User::inRandomOrder()->pluck('id')->first(),
            'forum_id' => Forum::inRandomOrder()->pluck('id')->first(),
            'approved' => (bool)rand(0, 1)
        ];
    }
}
