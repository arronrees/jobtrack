<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(40),
            'type' => 'Website Update',
            'status' => 'In Progress',
            'cost' => rand(50, 10000),
            'due_date' => fake()->date(),
            'notes' => fake()->paragraph(3),
            'client_id' => Client::factory(),
            'user_id' => User::factory()
        ];
    }
}
