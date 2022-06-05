<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => \App\Models\Category::where('status', 1)->inRandomOrder()->take(1)->pluck('id')->first(),
            'name' => $this->faker->name(),
            'detail' => $this->faker->realText(100),
            'sort_detail' => $this->faker->realText(50),
            'images' => $this->faker->image('public/storage/', 400, 300, null, false),
        ];
    }
}
