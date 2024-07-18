<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand = rand(0, 100000);

        return [
            'name' => fake()->company(),
            'website' => 'https://google.com',
            'notes' => '',
            'contact_name' => fake()->name(),
            'logo' => "http://picsum.photos/seed/$rand/600",
        ];
    }
}
