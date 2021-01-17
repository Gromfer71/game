<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LastMessagesInDialogsTest extends TestCase
{
    public function setUp()
    :void
    {
        parent::setUp();
        Auth::login(User::factory()->create());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_no_one_message()
    {
        $user = User::factory()->create();

        Message::factory()->create(
            [
                'from' =>  $user->id,
                'from_login' =>  $user->login,
                'to' => Auth::user()->id,
                'to_login' => Auth::user()->login,
            ]
        );

        $response = $this->get(route('dialogs'));
        $response->assertViewIs('auth.mail.dialogs');
        $response->assertViewHasAll(['messages']);
        $response->assertOk();
    }
    public function test_one_outgoing_message()
    {
        $user = User::factory()->create();

        Message::factory()->create(
            [
                'from' =>  Auth::user()->id,
                'from_login' =>  Auth::user()->login,
                'to' => $user->id,
                'to_login' => $user->login,
            ]
        );

        $response = $this->get(route('dialogs'));
        $response->assertViewIs('auth.mail.dialogs');
        $response->assertViewHasAll(['messages']);
        $response->assertOk();
    }

    public function test_one_incoming_message()
    {
        $user = User::factory()->create();

        Message::factory()->create(
            [
                'from' =>  $user->id,
                'from_login' =>  $user->login,
                'to' => Auth::user()->id,
                'to_login' => Auth::user()->login,
            ]
        );

        $response = $this->get(route('dialogs'));
        $response->assertViewIs('auth.mail.dialogs');
        $response->assertViewHasAll(['messages']);
        $response->assertOk();
    }

    public function test_two_messages_incoming_message_last()
    {
        $user = User::factory()->create();

        Message::factory()->create(
            [
                'from' =>  Auth::user()->id,
                'from_login' =>  Auth::user()->login,
                'to' => $user->id,
                'to_login' => $user->login,
            ]
        );
        Message::factory()->create(
            [
                'from' =>  $user->id,
                'from_login' =>  $user->login,
                'to' => Auth::user()->id,
                'to_login' => Auth::user()->login,
            ]
        );


        $response = $this->get(route('dialogs'));
        $response->assertViewIs('auth.mail.dialogs');
        $response->assertViewHasAll(['messages']);
        $response->assertOk();
    }

    public function test_two_messages_outgoing_message_last()
    {
        $user = User::factory()->create();

        Message::factory()->create(
            [
                'from' =>  $user->id,
                'from_login' =>  $user->login,
                'to' => Auth::user()->id,
                'to_login' => Auth::user()->login,
            ]
        );
        Message::factory()->create(
            [
                'from' =>  Auth::user()->id,
                'from_login' =>  Auth::user()->login,
                'to' => $user->id,
                'to_login' => $user->login,
            ]
        );

        $response = $this->get(route('dialogs'));
        $response->assertViewIs('auth.mail.dialogs');
        $response->assertViewHasAll(['messages']);
        $response->assertOk();
    }
}
