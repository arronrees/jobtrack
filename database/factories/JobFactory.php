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
            'due_date' => fake()->dateTimeBetween('now', '+2 weeks'),
            'notes' => fake()->paragraph(3),
            'client_id' => rand(1, 100), // assuming 100 made in client seeder and not using uuids
            'user_id' => rand(1, 15) // assuming 15 made in user seeder and not using uuids
        ];
    }
}
