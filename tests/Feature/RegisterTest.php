<?php

namespace Tests\Feature;

use Hash;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    /** @test */
    public function SuccessReg()
    {
        $this->get('/');
        $response = $this->post(route('register'), ['login' => 'user', 'password' => '123', 'password_confirmation' => '123']);
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['login' => 'user']);
        $response->assertLocation('/home');

    }

    /** @test */
    public function InvalidLogin()
    {
        $this->get('/');
        $response = $this->post(route('register'), ['login' => '', 'password' => '123', 'password_confirmation' => '123']);
        $this->assertGuest();
        $this->assertDatabaseMissing('users', ['login' => '']);
        $response->assertLocation('/');
    }

    /** @test */
    public function InvalidPassword()
    {
        $this->get('/');
        $response = $this->post(route('register'), ['login' => 'user', 'password' => '', 'password_confirmation' => '']);
        $this->assertGuest();
        $this->assertDatabaseMissing('users', ['login' => 'user']);
        $response->assertLocation('/');
    }
    /** @test */
    public function InvalidPasswordCnfirmation()
    {
        $this->get('/');
        $response = $this->post(route('register'), ['login' => 'user', 'password' => '123', 'password_confirmation' => '321']);
        $this->assertGuest();
        $this->assertDatabaseMissing('users', ['login' => 'user']);
        $response->assertLocation('/');
    }

    public function test_castle_created_after_registration()
    {
        $this->post(route('register'), ['login' => 'user', 'password' => '123', 'password_confirmation' => '123']);
        $this->assertDatabaseHas('user_buildings', ['user_id' => \Auth::id(), 'base_id' => '1']);
    }

}
