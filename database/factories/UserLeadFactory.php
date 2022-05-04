<?php

namespace Database\Factories;

use App\Models\UserLead;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserLead>
 */
class UserLeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->email,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
        ];
    }
}
