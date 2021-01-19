<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        \Auth::login(User::factory()->create());

        $response = $this->post(route('logout'));

        $this->assertGuest();
        $response->assertLocation('/');

    }
}
