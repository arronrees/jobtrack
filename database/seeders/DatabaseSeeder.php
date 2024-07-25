<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Invoice;
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
        User::factory(15)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Client::factory(100)->create();

        Job::factory(300)->create(new Sequence([
            'status' => 'In Progress',
            'type' => 'Website Build',
        ], [
            'status' => 'Complete',
            'type' => 'Website Update',
        ], [
            'status' => 'Complete',
            'type' => 'Website Build',
            'archived' => true
        ], [
            'status' => 'Complete',
            'type' => 'Graphic Design',
            'archived' => true
        ], [
            'status' => 'To Start',
            'type' => 'Logo Design',
        ]));

        Invoice::factory(400)->create(new Sequence([
            'status' => 'Invoiced',
        ], [
            'status' => 'Invoiced',
            'archived' => true
        ], [
            'status' => 'Ready To Invoice',
        ], [
            'status' => 'Paid',
            'archived' => true
        ]));
    }
}
