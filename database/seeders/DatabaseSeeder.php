<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@barbershop.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Staff
        User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staff@barbershop.com',
            'password' => bcrypt('password'),
            'role' => 'staff',
        ]);

        // Client
        User::factory()->create([
            'name' => 'Client User',
            'email' => 'client@barbershop.com',
            'password' => bcrypt('password'),
            'role' => 'client',
        ]);

        // Random clients
        User::factory(10)->create([
            'role' => 'client',
        ]);

        $this->call([
            ServiceSeeder::class,
        ]);
    }
}
