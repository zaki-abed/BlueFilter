<?php

namespace Database\Factories;

use App\Models\ContactQuery;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactQueryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactQuery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'subject' => $this->faker->sentence,
            'message' => $this->faker->realText()
        ];
    }
}
