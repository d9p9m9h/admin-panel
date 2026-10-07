<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    

    public function test_the_application_returns_a_successful_response(): void
{
    $response = $this->get('/');

    // '/' ကို ဝင်ရင် '/admin' ကို redirect လုပ်တာကို စစ်မယ်
    $response->assertRedirect('/admin');
    
    // သို့မဟုတ် Guest တွေ မြင်ရမယ့် Login page ကို တိုက်ရိုက်စစ်မယ်
    $loginResponse = $this->get('/login');
    $loginResponse->assertStatus(200);
}

    /**
     * A basic test example.
     */
        // public function test_the_application_returns_a_successful_response(): void
        // {
        //     $response = $this->get('/');

        //     $response->assertStatus(200);
        // }
}
