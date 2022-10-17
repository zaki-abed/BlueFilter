<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email,
            'name' => $this->faker->name,
            'profile_image' => $this->faker->image('storage/app/public/images',300,300, "people", false),
            'password' => 'admin123',
            'phone' => $this->faker->phoneNumber,
            'type' => 'customer',
            'address' => $this->faker->address
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    // public function client()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'category_id' => null,
    //         ];
    //     });
    // }
}
