<?php

namespace Tests\Feature;

use App\Models\Portfolio;
use App\Models\User;
use Tests\TestCase;

class PortfolioOwnershipTest extends TestCase
{
    public function test_one_client_owns_exactly_one_portfolio(): void
    {
        $client = User::factory()->create(['role' => User::ROLE_CLIENT]);

        Portfolio::create([
            'owner_id' => $client->id,
            'name' => 'Test Portfolio',
            'slug' => 'test-portfolio',
        ]);

        // ဒုတိယ portfolio ထပ်ထည့်ရင် unique constraint က block လုပ်ရမယ်
        
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Portfolio::create([
            'owner_id' => $client->id,
            'name' => 'Second',
            'slug' => 'second',
        ]);
    }
}