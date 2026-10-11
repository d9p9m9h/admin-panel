<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_root_redirects_to_admin(): void
    {
        $this->get('/')->assertRedirect('/admin');
    }

    public function test_guest_is_redirected_from_admin_to_login(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_login_page_is_accessible(): void
    {
        $this->get('/login')->assertOk();
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
