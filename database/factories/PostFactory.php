<?php

namespace Database\Factories;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::all();
        return [
            "title" => $this->faker->text(20),
            "author" => $this->faker->name(),
            'category_id' => $category->random()->id,
            'created_at' => Carbon::now()->subDays(rand(0, 29))
        ];
    }
}
