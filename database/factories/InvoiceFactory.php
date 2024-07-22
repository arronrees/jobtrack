<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(25),
            'status' => 'Invoiced',
            'amount' => rand(50, 10000),
            'invoice_date' => fake()->dateTimeBetween('-4weeks', '+2 weeks'),
            'due_date' => fake()->dateTimeBetween('now', '+4 weeks'),
            'notes' => fake()->paragraph(2),
            'private_notes' => fake()->paragraph(4),
            'job_id' => rand(1, 300), // assuming 300 made in job seeder and not using uuids
        ];
    }
}
