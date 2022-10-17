<?php

namespace Database\Factories;

use App\Models\MediaImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MediaImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'filename' => $this->faker->image('storage/app/public/images',300,300, null, false),
        ];
    }
}
