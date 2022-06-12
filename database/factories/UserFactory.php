<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'age' => rand(12,90),
            'height' => rand(155,190),
            'weight' => rand(60,200),
            'gender'=>$this->faker->randomElement(['male', 'female']),
            'weightGoal'=>$this->faker->randomElement(['gain', 'lose','maintain']),
            'fatpercentage'=>rand(1,100),
            'activityId'=>rand(1,5),
            'isblocked'=>false,
            'remember_token' => Str::random(10),
            'lastLogin'=>Carbon::now()

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
