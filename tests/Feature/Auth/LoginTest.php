<?php

namespace Tests\Feature;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use DB;
class LoginTest extends TestCase
{
    public function setUp()
    :void
    {
        parent::setUp();
        Auth::logout();
    }
    /** @test */
    public function auth_success()
    {
        $user = User::factory()->create(['password' => \Hash::make('pass')]);
        \Auth::attempt(['login' => $user->login, 'password' => 'pass']);

        $this->assertAuthenticated();
    }

    /** @test */
    public function login_failed()
    {
        User::factory()->create(['login' => 'username1', 'password' => \Hash::make('pass')]);
        \Auth::attempt(['login' => 'username2', 'password' => 'pass']);

        $this->assertGuest();
    }

    /** @test */
    public function password_failed()
    {
        User::factory()->create(['login' => 'username', 'password' => \Hash::make('pass1')]);
        \Auth::attempt(['login' => 'username', 'password' => 'pass2']);

        $this->assertGuest();
    }


}
