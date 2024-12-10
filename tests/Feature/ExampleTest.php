<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Artisan;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function test_migrate_fresh()
    {
        Artisan::call("migrate:fresh");
        $this->assertTrue(true);
    }
    public function test_empty_user()
    {
        $user_count = User::count();
        $this->assertEquals(0, $user_count);
    }
    // Test Add User
    public function test_Add_user()
    {
        $resp = $this->post('api/users', [
            "name" => "Mostafa",
            "email" => "mostafa@gmail.com",
            "password" => "12345678",
        ]);
        $resp->assertStatus(201);
        $this->assertDatabaseHas('users', [
            "email" => "mostafa@gmail.com",
        ]);
    }
    public function test_get_users()
    {
        $resp = $this->get('api/users');
        $resp->assertStatus(200);

    }
}
