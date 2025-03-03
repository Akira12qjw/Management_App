<?php

namespace Database\Seeders;

use App\Models\Projects;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Giang',
            'email' => 'giang@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Projects::factory()
            ->count(30)
            ->hasTasks(30)
            ->create();
    }
}
