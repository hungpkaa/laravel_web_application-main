<?php

namespace Database\Seeders;

use App\Models\Project;
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
        // Ensure there is at least one user with id=1 so factories that
        // reference users by id won't violate foreign key constraints.
        User::factory()->create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'id' => 2,
            'name' => 'User Two',
            'email' => 'user2@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'id' => 3,
            'name' => 'gnohp',
            'email' => 'gnohp@example.com',
            'password' => bcrypt('123.321A'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'id' => 4,
            'name' => 'Duc Phong',
            'email' => 'ducphong@example.com',
            'password' => bcrypt('123.321A'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'id' => 5,
            'name' => 'User Five',
            'email' => 'user5@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        Project::factory()
            ->count(30)
            ->hasTasks(30)
            ->create();
    }
}