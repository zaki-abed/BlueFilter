<?php

namespace Database\Factories;

use App\Models\ServiceProviderClicks;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceProviderClicksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceProviderClicks::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_provider_id' => User::serviceProvider()->unique()->first()->id,
            'click_count' => $this->faker->randomNumber()
        ];
    }
}
