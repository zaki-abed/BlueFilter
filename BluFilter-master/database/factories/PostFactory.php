<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
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
            'title' => $this->faker->sentence,
            'brief' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'featured_image' => $this->faker->image('storage/app/public/images',640,480, null, false),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
