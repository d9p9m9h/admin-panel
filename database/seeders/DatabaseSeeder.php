<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        $client = User::create([
            'name' => 'Client',
            'email' => 'd9p@client.com',
            'password' => 'pswd',
            'role' => User::ROLE_CLIENT,
        ]);

        Portfolio::create([
            'owner_id' => $client->id,
            'name' => 'Client A Portfolio',
            'slug' => 'client-a',
            'status' => Portfolio::STATUS_DRAFT,
        ]);
    }
}
