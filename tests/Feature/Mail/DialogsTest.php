<?php

namespace Tests\Feature\Mail;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DialogsTest extends TestCase
{
    public function test_no_one_message()
    {
        $user = User::factory()->create();

        Message::factory()->create(
            [
                'from'       => $user->id,
                'from_login' => $user->login,
                'to'         => Auth::user()->id,
                'to_login'   => Auth::user()->login,
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
                'from'       => Auth::user()->id,
                'from_login' => Auth::user()->login,
                'to'         => $user->id,
                'to_login'   => $user->login,
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
                'from'       => $user->id,
                'from_login' => $user->login,
                'to'         => Auth::user()->id,
                'to_login'   => Auth::user()->login,
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
                'from'       => Auth::user()->id,
                'from_login' => Auth::user()->login,
                'to'         => $user->id,
                'to_login'   => $user->login,
            ]
        );
        Message::factory()->create(
            [
                'from'       => $user->id,
                'from_login' => $user->login,
                'to'         => Auth::user()->id,
                'to_login'   => Auth::user()->login,
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
                'from'       => $user->id,
                'from_login' => $user->login,
                'to'         => Auth::user()->id,
                'to_login'   => Auth::user()->login,
            ]
        );
        Message::factory()->create(
            [
                'from'       => Auth::user()->id,
                'from_login' => Auth::user()->login,
                'to'         => $user->id,
                'to_login'   => $user->login,
            ]
        );

        $response = $this->get(route('dialogs'));
        $response->assertViewIs('auth.mail.dialogs');
        $response->assertViewHasAll(['messages']);
        $response->assertOk();
    }
}
