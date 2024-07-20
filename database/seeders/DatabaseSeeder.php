<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Client::factory(100)->create();

        Job::factory(15)->create(new Sequence([
            'status' => 'In Progress',
            'type' => 'Website Build',
        ], [
            'status' => 'Complete',
            'type' => 'Website Update',
        ], [
            'status' => 'To Start',
            'type' => 'Logo Design',
        ]));
    }
}
