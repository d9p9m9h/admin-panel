<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Super Admin',
            'email' => 'd9p@admin.com',
            'password' => 'pswd',
            'role' => User::ROLE_SUPER_ADMIN,
        ]);

        User::create([
            'name' => 'Client',
            'email' => 'd9p@client.com',
            'password' => 'pswd',
            'role' => User::ROLE_CLIENT,
        ]);
    }
}
